<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;

class ContactController extends Controller
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


    public function index()
    {

        try {

            $getClient = $this->client->get('company/1');
            $body = $getClient->getBody();
            $body = \GuzzleHttp\json_decode($body, false);
            $uri = $this->uri;

            return view('contact_us')
                ->with(['body'=> $body])
                ->with(['uri' => $uri]);


        }catch (RequestException $e){

            echo Psr7\str($e->getRequest());

            if($e->hasResponse()){

                echo Psr7\str($e->getResponse());

            }
        }
    }
}
