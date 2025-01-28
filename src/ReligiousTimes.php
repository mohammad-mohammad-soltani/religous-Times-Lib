<?php

namespace MS\ReligousTimes;
libxml_use_internal_errors(true);

class ReligiousTimes{
    public $dom;
    public $xpath;
    public function __construct() {
        $this -> dom = new \DOMDocument();
        $this -> xpath = new \DOMXPath($this -> dom);
        define("CityNotFound" , "CITY_NOT_FOUND");
    }
    function get_data(string $cityName){
        $content = @file_get_contents("https://www.bahesab.ir/time/$cityName/");

        if($content != "404" && $content !== false){
            $this -> dom -> loadHTML('<!DOCTYPE html>' . $content);
            $enNum = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            $faNum = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            $times  = [
                "time1" => [
                    "fa" => $this ->dom -> getElementById("azan-time1") -> textContent ,
                    "en" => str_replace($faNum , $enNum , $this ->dom -> getElementById("azan-time1") -> textContent ),
                    "label" => "اذان صبح",
                ],
                "time2" => [
                    "fa" => $this ->dom -> getElementById("azan-time2") -> textContent ,
                    "en" => str_replace($faNum , $enNum , $this ->dom -> getElementById("azan-time2") -> textContent ),
                    "label" => "طلوع آفتاب",
                ],
                "time3" => [
                    "fa" => $this ->dom -> getElementById("azan-time3") -> textContent ,
                    "en" => str_replace($faNum , $enNum , $this ->dom -> getElementById("azan-time3") -> textContent ),
                    "label" => "اذان ظهر",
                ],
                "time4" => [
                    "fa" => $this ->dom -> getElementById("azan-time4") -> textContent ,
                    "en" => str_replace($faNum , $enNum , $this ->dom -> getElementById("azan-time4") -> textContent ),
                    "label" => "غروب آفتاب",
                ],
                "time5" => [
                    "fa" => $this ->dom -> getElementById("azan-time5") -> textContent ,
                    "en" => str_replace($faNum , $enNum , $this ->dom -> getElementById("azan-time5") -> textContent ),
                    "label" => "اذان مغرب",
                ],
                "time6" => [
                    "fa" => $this ->dom -> getElementById("azan-time6") -> textContent ,
                    "en" => str_replace($faNum , $enNum , $this ->dom -> getElementById("azan-time6") -> textContent ),
                    "label" => "نیمه شب شرعی",
               ]
            ];
            return [
                "success" => true,
                "data" => $times
            ];
        }else{
            return ["success" => false , "Type" => CityNotFound , "Description" => "Target City Not Found"];
        }     
    }
    function echo_city_names(){
        return ["mashhad" , "isfahan" , "karaj" , "shiraz" , "tabriz" , "qom" , "ahvaz" , "kermanshah" , "urmia" , "rasht" , "zahedan" , "hamedan" , "kerman" , "yazd" , "ardebil" , "bandarabbas" , "arak" , "eslamshahr" , "zanjan" , "sanandaj" , "qazvin" , "khorramabad" , "gorgan" , "sari" , "shahriar" , "qods" , "kashan" , "malard" , "dezful" , "neyshabur" , "babol" , "khomeynishahr" , "sabzevar" , "borujerd" , "golestan" , "amol" , "pakdasht" , "najafabad" , "abadan" , "qarchak" , "bojnurd" , "varamin" , "bushehr" , "saveh" , "qaemshahr" , "birjand" , "nasimshahr" , "sirjan" , "khoy" , "ilam" , "bukan" , "shahrekord" , "semnan" , "yasuj" , "kish" , "qeshm" , "OutherCityes"];
    }
}