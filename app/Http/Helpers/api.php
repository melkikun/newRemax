<?php
namespace App\http\Helpers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App;

class Api{

    private $baseUri;
    private $client;

    function __construct()
    {
        if (App::environment('local', 'development')) {
            $this->baseUri = env('API_LOCAL');
        }else if(App::environment('testing', 'staging')){
            $this->baseUri = env('API_TESTING');
        }else if(App::environment('production')){
            $this->baseUri = env('API_PRODUCTION');
        }
        $this->client = new GuzzleHttpClient(['base_uri' =>$this->baseUri, 'verify' => false]);
    }

    public function getBaseUri(){
        return $this->baseUri;
    }

    public function getOfficeInfo($account){
        $id = "";
        try {
            $officeApi = $this->client->get("franchise", ["query"=>['filter[frofDomain]'=>"'%$account%'"]]);
            $office = json_decode($officeApi->getBody()->getContents(), true);
            $id = $office['data'][0]['id'];

        }catch (RequestException $e){
            return Psr7\str($e->getRequest());
            if($e->hasResponse()){
                return Psr7\str($e->getResponse());
            }
        }
        return $id;
    }
}