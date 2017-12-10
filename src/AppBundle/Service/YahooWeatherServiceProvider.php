<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

/**
 * Description of YahooWeatherServiceProvider
 *
 * @author Oleg
 */
class YahooWeatherServiceProvider implements WeatherServiceProviderInterface{
    
    public $name = "Yahoo";
    
    private $baseUrl = "http://query.yahooapis.com/v1/public/yql";
    
    private $locations = [
        'Vilnius' => 479616
    ];

    public function getWeather($city) {
        $woeid = $this->getLocationWoeid($city);
        
        if($woeid){
            $yql_query = 'select item.condition from weather.forecast where woeid = 479616 and u = "c"';
            $yql_query_url = $this->baseUrl . "?q=" . urlencode($yql_query) . "&format=json";
        
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);

            $phpObj =  json_decode($json);       

            return $phpObj;
        }else{
            throw new ErrorException('Location is not in the list, please update the list or specify another location.');
        }
    }
    
    public function getLocationWoeid($city){
        $location = null;
        if(array_key_exists($city, $this->locations)){
            $location = $this->locations[$city];
        }
        return $location;
    }
    
}
