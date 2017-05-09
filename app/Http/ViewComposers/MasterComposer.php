<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use GuzzleHttp\Client as GuzzleHttpClient;

class MasterComposer
{

    public function compose(View $view)
    {
        $client = new GuzzleHttpClient(['base_uri'=>'https://www.remax.co.id/prodigy/papi/','verify'=>false]);
        $getClient = $client->get('company/1');
        $footer = $getClient->getBody()->getContents();
        $footer = \GuzzleHttp\json_decode($footer,false);

        $view->with('footer')->with(['footer' => $footer]);
    }

}


?>

