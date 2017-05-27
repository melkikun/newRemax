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
class HomeController extends Controller
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
        $id = $this->api->getOfficeInfo($account);
        $language = $this->bahasa->setSession($this->request->input("language"));
        $oldLanguage = Cache::remember('lang', 60, function(){
          return $this->bahasa->setSession($this->request->input("language"));
      });    
        if($id != ""){
            if($language != $oldLanguage){
              Cache::flush();
          }
          $bank = Cache::remember('banks', 30, function(){
            $banks = \GuzzleHttp\json_decode($this->client->get('bank')->getBody(),true);
            return $banks;
        });
          $list = Cache::remember('lists', 30, function() use($language){
             $lists = \GuzzleHttp\json_decode($this->client->get('ListingCategory?language='.$language)->getBody(),true);
             return $lists;
         });
          return view('index', compact('bank', 'list'));
      }
  }
}


