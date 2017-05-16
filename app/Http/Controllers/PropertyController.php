<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    protected $api;
    protected $uri;
    protected $client;

    public function __construct(Api $api)
    {
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' => $this->api->getBaseUri(),'verify' => false]);
        $this->uri = $this->api->getBaseUri();
    }

    public function getData()
    {
        return view('search');
    }

    public function showPropertyDetail($listUri){
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

    public function postInquiry(Request $request)
    {


    }


}
