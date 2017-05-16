<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;
use App\Http\Helpers\SesiBahasa as bahasa;
use Session;

class AboutController extends Controller
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
 if($id != ""){
    $this->client = new GuzzleHttpClient(['base_uri' => 'http://genius.intelligence.id/papi/','verify' => false]);
    try {
        $about = $this->client->get('webabout?filter[wbabFrofId][null]=1&language='.$language);
        $body = $about->getBody();
        $body = \GuzzleHttp\json_decode($body, true);
        $uri = $this->uri;
        if($about->getStatusCode() == 200){
            return view('about_us', compact('body', 'uri'));
        }else{
            return redirect()
            ->back()
            ->with('error','something is error with API');
        }
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
