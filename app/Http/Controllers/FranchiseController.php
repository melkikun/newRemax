<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;
use Illuminate\Support\Facades\Session;


class FranchiseController extends Controller
{


    protected $api;
    protected $client;
    protected $uri;
    protected $lang;
    protected $session;


    public function __construct(Api $api,Request $request)
    {
        $this->lang = $request->get('language');
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' => $this->api->getBaseUri(), 'verify' => false]);
        $this->uri = $this->api->getBaseUri();
    }


    public function index()
    {


            $test = new GuzzleHttpClient(['base_uri' => 'http://genius.intelligence.id/papi/','verify' => false]);
        try {

            if($this->lang == null){
                $language = Session::get('lang');
            }else{
                $language = $this->lang;
            }


            $getClient = $test->get('webfranchise?language='.$language);
            $body = $getClient->getBody();
            $body = \GuzzleHttp\json_decode($body, false);
            $uri = $this->uri;


            if ($getClient->getStatusCode() == 200) {
                return view('franchise')
                    ->with(['body' => $body])
                    ->with(['uri' => $uri]);
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'something is error');
            }


        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());

            if($e->hasResponse()){
                echo Psr7\str($e->getResponse());
            }

        }

    }
}
