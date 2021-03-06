<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;
use App\Http\Helpers\SesiBahasa as bahasa;
use Session;
use Cache;

class FranchiseController extends Controller{

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
    $id = $this->api->getOfficeInfo($account);
    $uri = $this->uri;
    $language = $this->bahasa->setSession($this->request->input("language"));
    $oldLanguage = Cache::remember('lang', 60, function(){
        return $this->bahasa->setSession($this->request->input("language"));
    });    
    if($id != ""){
      try {
        if($language != $oldLanguage){
            Cache::flush();
        }
        $body = Cache::remember('bodys', 60, function() use($language){
          $this->client = new GuzzleHttpClient(['base_uri' => 'http://genius.intelligence.id/papi/','verify' => false]);
          $about = $this->client->get('webfranchise?language='.$language);
          $bodys = \GuzzleHttp\json_decode($about->getBody(), true);
          return $bodys;
      });
        return view('franchise', compact('body', 'uri'));
    } catch (RequestException $e) {
        echo Psr7\str($e->getRequest());
        if ($e->hasResponse()) {
          echo Psr7\str($e->getResponse());
      }
  }
}else{
  echo "tidak ada account";
}
}
}
