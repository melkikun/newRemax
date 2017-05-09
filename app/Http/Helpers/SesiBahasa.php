<?php
namespace App\http\Helpers;

use Illuminate\Http\Request;
use App;

class SesiBahasa{
    private $request;
    function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function setSession($bahasa){
        $language = "";
        if($bahasa != ""){
            $this->request->session()->put('bahasa', $bahasa);
            $language = $bahasa;
        }else{
            if($this->request->session()->get('bahasa')==""){
                $this->request->session()->put('bahasa', "en");
                $language = "en";
            }else{
                $this->request->session()->put('bahasa', $this->request->session()->get('bahasa'));
                $language = $this->request->session()->get('bahasa');
            }
        }
        return $language;
    }
}