<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;
use App\Http\Helpers\SesiBahasa as bahasa;
use Session;

class HomeController extends Controller
{
    private $client;
    private $uri;
    private $api;
    private $request;
    private $bahasa;

    public function __construct(Api $api ,Request $request, bahasa $bahasa)
    {
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' => $this->api->getBaseUri(),'verify' => false]);
        $this->uri = $this->api->getBaseUri();
        $this->request = $request;
        $this->bahasa = $bahasa;
    }

    public function index($account)
    {
        $language = $this->bahasa->setSession($this->request->input("language")); 
        $id = $this->api->getOfficeInfo($account);
        try{
            $getList = $this->client->get('ListingCategory?language='.$language);
            $getBank = $this->client->get('bank');
            $bank = \GuzzleHttp\json_decode($getBank->getBody(),true);
            $list = \GuzzleHttp\json_decode($getList->getBody(),true);
            if(true){
                return view('index',compact('bank','list'));
            }else{
                return redirect()
                    ->back()
                    ->with('error','something is error with API');
            }
        }catch (RequestException $e){
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
    }

    public function searchHome()
    {

       $buySearch = $request->input('buySearch');
       $rentSearch = $request->input('rentSearch');
//
//             $client = new GuzzleHttpClient(['base_uri' => 'http://prodigy.intelligence.id/', 'verify' => false]);
//
//        try {
//
//            $getClient = $client->get('papi/listing?filter[mctyDescription]=\'%' . $buySearch . '%\'');
//
//            $data = $getClient->getBody();
//            $search = \GuzzleHttp\json_decode($data, false);
//
//
//
//
//            if (is_null($search->data)) {
//                return redirect()
//                    ->back()
//                    ->with('error', 'Data Not Found');
//
//            } else {
//                dump($search);
//                return view('search', compact('search'));
//
//            }
//
//        } catch (RequestException $e) {
//            echo Psr7\str($e->getRequest());
//            if ($e->hasResponse()) {
//                echo Psr7\str($e->getResponse());
//            }
//        }

        return view('search');
    }
}


