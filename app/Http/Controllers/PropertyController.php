<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;
use App\Http\Helpers\SesiBahasa as bahasa;
use Session;

class PropertyController extends Controller
{

    private $client;
    private $uri;
    private $api;
    private $request;
    private $bahasa;

    public function __construct(Api $api ,Request $request, bahasa $bahasa){
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' => $this->api->getBaseUri(),'verify' => false]);
        $this->uri = $this->api->getBaseUri();
        $this->request = $request;
        $this->bahasa = $bahasa;
    }

    public function index($account){
        $language = $this->bahasa->setSession($this->request->input("language")); 
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $currentPage = $this->request->input('page');
                if ($currentPage == "") {
                    $currentPage = 1;
                }
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $propertyTotalApi = $this->client->get("listing", ["query" => ['filter[frofId]' => "$id"]]);
                $propertyApi = $this->client->get("listing", ["query" => ['filter[frofId]' => "$id", 'pageNumber' => "$currentPage", 'pageSize' => '100']]);
                $facilityApi = $this->client->get("facility");
                $listingcategoryApi = $this->client->get("listingcategory");
                $propertytypeApi = $this->client->get("propertytype");
                if ($officeApi->getStatusCode() == 200 && $propertyApi->getStatusCode() == 200 && $propertyTotalApi->getStatusCode() == 200 && $currentPage != "" && $facilityApi->getStatusCode() == 200 && $listingcategoryApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $propertyTotal = json_decode($propertyTotalApi->getBody()->getContents(), true);
                    $property = json_decode($propertyApi->getBody()->getContents(), true);
                    $facility = json_decode($facilityApi->getBody()->getContents(), true);
                    $propertytype = json_decode($propertytypeApi->getBody()->getContents(), true);
                    $listingcategory = json_decode($listingcategoryApi->getBody()->getContents(), true);
                    return view("property", compact('office', 'property', 'propertyTotal', 'currentPage', 'facility', 'listingcategory', 'propertytype'));
                } else {
                    abort("404");
                }
            } catch (RequestException $e) {
                if ($e->getResponse()->getStatusCode() != '200') {
                    if ($e->hasResponse()) {
                        abort("404");
                    } else {
                        echo Psr7\str($e->getRequest());
                    }
                }
            }
        }
    }

    public function showPropertyDetail($account, $listUri){
        try {
            $getClient = $this->client->get('listing/'.$listUri);
            $body = $getClient->getBody();
            $body = \GuzzleHttp\json_decode($body, false);
            $uri = $this->uri;

            // get Office Id
            $officeId = $body->linked->listOfficeId->frofId;
            $getOffice = $this->client->get('listing?filter[listOfficeId]='.$officeId);
            $office = $getOffice->getBody();
            $office = \GuzzleHttp\json_decode($office,false);
            // end office id

            // get membership
            $membershipId = $body->linked->listMmbsId->mmbsId;
            $getMembership = $this->client->get('Membership/'.$membershipId);
            $membership = $getMembership->getBody();
            $membership = \GuzzleHttp\json_decode($membership,false);

            //

            if ($getClient->getStatusCode() == 200) {
                return view('property_page')
                ->with(['body' => $body])
                ->with(['uri' => $uri])
                ->with(['membership' => $membership])
                ->with(['office' => $office]);

            } else {
                return redirect()
                ->back()
                ->with('error', 'something error with API');
            }


        }catch (RequestException $e){
            echo Psr7\str($e->getRequest());
            if($e->hasResponse()){

                echo Psr7\str($e->getResponse());
            }
        }
    }

    public function postInquiry(Request $request){
    }


}
