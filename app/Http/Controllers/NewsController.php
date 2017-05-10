<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;

class NewsController extends Controller
{
    protected $api;
    protected $client;
    protected $uri;


    public function __construct(Api $api , Request $request)
    {
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' => $this->api->getBaseUri(), 'verify' => false]);
        $this->uri = $this->api->getBaseUri();
        $this->request = $request;
    }

    public function index()
    {
        try {

            $getClient = $this->client->get('webnews');
            $body = $getClient->getBody();
            $body = \GuzzleHttp\json_decode($body, false);
            $uri = $this->uri;

            if ($getClient->getStatusCode() == 200) {

                return view('news')
                    ->with(['body' => $body])
                    ->with(['uri' => $uri]);

            } else {

                return redirect()->back()
                    ->with('error', 'something is error with API');
            }


        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
    }


    public function newsDetail($account, $id)
    {
        try {

            $getClient = $this->client->get('webnews/'.$id);
            $body = $getClient->getBody();
            $body = \GuzzleHttp\json_decode($body, false);
            $uri = $this->uri;

            if ($getClient->getStatusCode() == 200) {

                return view('news-detail')
                    ->with(['body' => $body])
                    ->with(['uri' => $uri]);

            } else {

                return redirect()->back()
                    ->with('error', 'something is error with API');
            }


        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
    }

}
