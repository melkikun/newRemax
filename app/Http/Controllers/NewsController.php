<?php

namespace App\Http\Controllers;


use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;
use App\Http\Helpers\SesiBahasa as bahasa;
use Session;

class NewsController extends Controller
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
    if ($id != "") {
        try {
            $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
            $newsApi = $this->client->get("webnews", ["query" => ['language' => $language]]);
            if ($officeApi->getStatusCode() == 200 && $newsApi->getStatusCode() == 200) {
                $office = json_decode($officeApi->getBody()->getContents(), true);
                $news = json_decode($newsApi->getBody()->getContents(), true);
                return view("news", compact('office', 'news'));
            } else {
                abort("404");
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                abort("404");
            } else {
                echo Psr7\str($e->getRequest());
            }
        }
    }
}


public function newsDetail($account, $param){
    $language = $this->bahasa->setSession($this->request->input("language")); 
    // echo $language;
    Session::set('lang', $language);
    $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $newsDetailApi = $this->client->get("webnews/$param", ["query" => ['language' => $language]]);
                $newsApi = $this->client->get("webnews");
                if ($newsDetailApi->getStatusCode() == 200 && $newsApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $detail = json_decode($newsDetailApi->getBody()->getContents(), true);
                    $news = json_decode($newsApi->getBody()->getContents(), true);
                    return view("news_detail", compact('id', 'detail', 'news', 'office'));
                } else {
                    abort("404");
                }
            } catch (RequestException $e) {
                if ($e->getResponse()->getStatusCode() != '200') {
                    abort("404");
                }
            }
        }
    // try {
    //     $getClient = $this->client->get('webnews/'.$id);
    //     $body = $getClient->getBody();
    //     $body = \GuzzleHttp\json_decode($body, false);
    //     $uri = $this->uri;

    //     if ($getClient->getStatusCode() == 200) {

    //         return view('news-detail')
    //         ->with(['body' => $body])
    //         ->with(['uri' => $uri]);

    //     } else {

    //         return redirect()->back()
    //         ->with('error', 'something is error with API');
    //     }


    // } catch (RequestException $e) {
    //     echo Psr7\str($e->getRequest());
    //     if ($e->hasResponse()) {
    //         echo Psr7\str($e->getResponse());
    //     }
    // }
}

}
