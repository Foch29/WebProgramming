<?php

namespace App\Http\Controllers;

use Session; //per importare Session nel Controller, non penso mi serva in realta, elimina dopo
use App\Models\Capital; 
use DateTime;


use Illuminate\Routing\Controller as BaseController;

class WeatherHub_Controller extends BaseController 
{ 
    private const URL_API_NOAA = 'https://www.ncei.noaa.gov/cdo-web/api/v2/';
    private const TOKEN1 = "WJqHXqxKycCrQdlGFGwUmQPdTzhUyddV";
    private const URL_API_AV = 'https://api.airvisual.com/v2/';
    private const TOKEN2 = "170a4691-3f5b-45fe-ac48-3a1140cd496a";

    
    private function subtract_n_Days($n){
        $date = new DateTime(); 
        $date->modify("-$n days"); 
        return $date->format('Y-m-d');
    }

    public function get_json(){

        $list_capital = Session::get("list_capital");

        
        $city = Capital::where("id",request("capital"))->first();
        
        $city_code = $city->code;
        $state = $city->state;
        $url_NOAA= $this::URL_API_NOAA."data?datasetid=GHCND&locationid=".$city_code."&startdate=".$this->subtract_n_Days(6)."&enddate=".$this->subtract_n_Days(1)."&limit=100";
        Session::put("state_capital",$city->state);
        Session::put("capital",$city->id);
        
        $url_AV = $this::URL_API_AV."city?city=".$city->id."&state=".$city->state."&country=USA&key=".$this::TOKEN2;

        
        //fetch codici citta per inserirli nel database
        //$url = $this::URL_API_NOAA."locations?locationcategoryid=CITY&offset=1300&limit=100";//da eliminare

        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url_NOAA);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $header = array("token:".$this::TOKEN1);
        curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        $json = curl_exec($curl);
        curl_close($curl);
        return view('weather')->with('json', $json)->with('list_capital', $list_capital)->with("air_quality_API",$url_AV);
    }
    public function get_available_capitals(){

        $list = Capital::all();
        $list_capital = [];
        foreach($list as $rows){
            array_push($list_capital,$rows->id);
        }
        Session::put("list_capital",$list_capital);
        
        return view('weather')->with('list_capital', $list_capital);
    }
}