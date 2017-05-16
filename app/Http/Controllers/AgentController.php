<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use App\Http\Helpers\Api;
use App\Http\Helpers\SesiBahasa as bahasa;
use Session;

class AgentController extends Controller
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
    $first = 1;
    $lang = $this->cekLang($this->request->input("language"));
    $id = $this->api->getOfficeInfo($account);
    if ($id != "") {
        try {
            $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
            $agentApi = $this->client->get("membership", ["query" => ['filter[msfcFrofId]' => "$id"]]);
            $agentInfoApi = $this->client->get("webagentinformation", ["query" => ['wbinFrofId' => "$id"]]);
            if ($officeApi->getStatusCode() == 200 && $agentApi->getStatusCode() == 200) {
                $office = json_decode($officeApi->getBody()->getContents(), true);
                $agent = json_decode($agentApi->getBody()->getContents(), true);
                $agentInfo = json_decode($agentInfoApi->getBody()->getContents(), true);
                return view("agent", compact('office', 'agent', 'agentInfo', 'first'));
            } else {
                abort("404");
            }
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() != '200') {
                if ($e->hasResponse()) {
                    abort("404");
                } else {
                    echo Psr7\str($e->getRequest());
                }
            }
        }
    }
}

public function detailAgent($account, $param){
    $id = $this->api->getOfficeInfo($account);
    $idAgent = $this->findIdAgent($id, $param);
    if ($id != "" && $idAgent != "") {
        try {
            $currentPage = $this->request->input('page');
            if ($currentPage == "") {
                $currentPage = 1;
            }
            $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
            $agentDetail = $this->client->get("membership", ["query" => [/*'filter[msfcFrofId]' => "$id",*/ 'filter[mmbsId]' => "'%$idAgent%'"]]);
            $propertyApi = $this->client->get("listing", ["query"=>[/*'filter[frofId]'=>"$id", */'filter[mmbsId]'=>$idAgent, 'pageNumber' => "$currentPage", 'pageSize' => '10']]);
            $propertyTotalApi = $this->client->get("listing", ["query" => ['filter[mmbsId]'=>$idAgent]]);
            if ($agentDetail->getStatusCode() == 200  && $propertyApi->getStatusCode() == 200 && $officeApi->getStatusCode() == 200) {
                $detail = json_decode($agentDetail->getBody()->getContents(), true);
                $property = json_decode($propertyApi ->getBody()->getContents(), true);
                $office = json_decode($officeApi ->getBody()->getContents(), true);
                $propertyTotal = json_decode($propertyTotalApi->getBody()->getContents(), true);
                return view("agent_detail", compact('id', 'office', 'property', 'propertyTotal', 'currentPage', 'detail'));
            } else {
                return view('agent_not_found');
            }
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() != '200') {
                if ($e->hasResponse()) {
                    abort("404");
                } else {
                    echo Psr7\str($e->getRequest());
                }
            }
        }
    }else{
        abort("404");
    }
}

public function findIdAgent($id, $param) {
    $idAgent = "";
    if ($id != "") {
        try {
            $agentDetail = $this->client->get("membership", ["query" => ['filter[mmbsFirstName]' => "'$param'"]]);
            if ($agentDetail->getStatusCode() == 200) {
                $detail = json_decode($agentDetail->getBody()->getContents(), true);
                if (count($detail['data']) > 0) {
                    foreach ($detail['data'] as $key => $value) {
                        $idAgent = $value['id'];
                    }
                } else {
                    $idAgent = "";
                }
            } else {
                $idAgent = "";
            }
        } catch (RequestException $e) {
           if ($e->getResponse()->getStatusCode() != '200') {
            if ($e->hasResponse()) {
                abort("404");
            } else {
                echo Psr7\str($e->getRequest());
            }
        }
    }
}else{
   abort("404");
}
return $idAgent;
}

public function searchAgent($account){
    $param = addslashes($this->request->input('agents'));
    $id = $this->api->getOfficeInfo($account);
    if($param == "All"){
        $param = "%";
    }
    if ($id != "") {
        try {
            $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
            $agentApi = $this->client->get("membership", ["query" => ['filter[msfcFrofId]' => "$id", 'filter[mmbsFirstName]' => "'$param%'"]]);
            $agentInfoApi = $this->client->get("webagentinformation", ["query" => ['wbinFrofId' => "$id"]]);
            if ($officeApi->getStatusCode() == 200 && $agentApi->getStatusCode() == 200) {
                $office = json_decode($officeApi->getBody()->getContents(), true);
                $agent = json_decode($agentApi->getBody()->getContents(), true);
                $agentInfo = json_decode($agentInfoApi->getBody()->getContents(), true);
                return view("agent", compact('office', 'agent', 'agentInfo'));
            } else {
                return view('agent_not_found');
            }
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() != '200') {
                if ($e->hasResponse()) {
                    abort("404");
                } else {
                    echo Psr7\str($e->getRequest());
                }
            }
        }
    }
}
}
