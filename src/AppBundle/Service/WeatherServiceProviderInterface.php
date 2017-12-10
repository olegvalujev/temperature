<?php

namespace AppBundle\Service;

/**
 * Weather service interface
 * @author Oleg
 */
interface WeatherServiceProviderInterface {
    
    public function getWeather($city);
}
