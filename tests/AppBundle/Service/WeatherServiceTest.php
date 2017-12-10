<?php

namespace Tests\AppBundle\Service;

use AppBundle\Service\WeatherService;
use PHPUnit\Framework\TestCase;
use AppBundle\Service\YahooWeatherServiceProvider;
/**
 * Testing a weather service class
 *
 * @author Oleg
 */
class WeatherServiceTest extends TestCase{
    /**
     * Testing response with weather conditions
     */
    public function testGetTemperature() {
        $provider = new YahooWeatherServiceProvider();
        $weatherService = new WeatherService($provider);
        $result = $weatherService->getTemperature('vilnius');
        
        $this->assertEquals(true, !empty($result));
    }
}
