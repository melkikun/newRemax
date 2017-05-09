<?php
/**
 * Created by PhpStorm.
 * User: DIGIKOM-EX3
 * Date: 4/12/2017
 * Time: 1:05 PM
 */

namespace App\Http\ViewComposers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Http\Request;
use App\Http\Helpers\Api;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Session;


class HeaderComposer
{
    /**
     * @param View $view
     */

    public $lang;
    public $api;
    public $client;

    public function __construct(Request $request , Api $api)
    {
        $this->lang = $request->get('language');
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri'=>$this->api->getBaseUri(),'verify'=>false]);

    }

    public function compose(View $view)
    {

        try {

            $language = $this->lang;
            $language = Session::set('lang',$language);

            $getClient = $this->client->get('webmenu?language=' . $language . '&filter[wbmnTo]=\'%c%\'');
            $getLanguage = $this->client->get('language');

            $header = $getClient->getBody()->getContents();
            $header = \GuzzleHttp\json_decode($header, false);

            $language = $getLanguage->getBody()->getContents();
            $language = \GuzzleHttp\json_decode($language, false);

            if ($getClient->getStatusCode() == 200 && $getLanguage->getStatusCode() == 200) {

                $view->with('header')
                    ->with(['header' => $header])
                    ->with(['language' => $language]);

            }else{
                return redirect()
                    ->back()
                    ->with('error','something is error with API');
            }
        }catch(RequestException $e){
            echo Psr7\str($e->getRequest());

            if($e->hasResponse()){

                echo Psr7\str($e->getResponse());
            }
        }

    }


}