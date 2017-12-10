<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace AppBundle\Service;



/**
 * Description of WeatherService
 *
 * @author Oleg
 */
class WeatherService{
    
    private $weatherService;
    
    public function __construct(YahooWeatherServiceProvider $weatherService) {
        
        $this->weatherService = $weatherService;
    }
    
    public function getTemperature() {
        $weather = $this->weatherService->getWeather('Vilnius');
        return $weather->query->results->channel->item->condition->temp;
    }
  
}
