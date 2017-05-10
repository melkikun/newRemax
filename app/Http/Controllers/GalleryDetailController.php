<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;

class GalleryDetailController extends Controller
{

    protected $api;
    protected $client;
    protected $uri;

    public function __construct(Api $api)
    {
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' => $this->api->getBaseUri(), 'verify' => false]);
        $this->uri = $this->api->getBaseUri();
    }


    public function index($account, $id)
    {
        try {
            $getClient = $this->client->get('webgallerydetail?filter[wbgaWbgyId]=' . $id . '');
            $body = $getClient->getBody();
            $body = \GuzzleHttp\json_decode($body, false);
            $uri = $this->uri;

            if ($getClient->getStatusCode() == 200) {
               return view('photos')
                    ->with(['body'=>$body])
                    ->with(['uri' =>$uri]);

            } else {

                return redirect()->back()->with('error','something is error with API');
            }

        } catch (RequestException $e) {

            echo Psr7\str($e->getRequest());

            if ($e->hasResponse()) {

                echo Psr7\str($e->getResponse());
            }
        }
    }
}
