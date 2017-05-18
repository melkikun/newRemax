<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;
use App\Http\Helpers\SesiBahasa as bahasa;
use Session;

class ContactController extends Controller
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


public function index($account){

 $language = $this->bahasa->setSession($this->request->input("language")); 
 $id = $this->api->getOfficeInfo($account);
 if($id != ""){
    try {
        $contactApi = $this->client->get("franchise/$id");
        if($contactApi->getStatusCode() == 200){
            $contact = json_decode($contactApi->getBody()->getContents(), true);
            return view('contact_us', compact('contact'));
        }
        else {
            abort("404");
        }
    }catch (RequestException $e){
        echo Psr7\str($e->getRequest());
        if($e->hasResponse()){
            echo Psr7\str($e->getResponse());
        }
    }
}else{
    echo "tidak ada account";
}
}
}
