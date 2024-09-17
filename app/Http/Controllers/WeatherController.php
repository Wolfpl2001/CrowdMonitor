<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Constraint\IsEmpty;
use App\Models\Evenement;


class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $eventId = $request->id;
        $city = $request->city;
        $selectedevent = Evenement::find($eventId)->toArray();
        if(Empty($city)){
            $city = $selectedevent['Stad'];
        }

        $apiKey = '98eabe9becb3d055061f7efaacb60661';
        $weatherResponse = Http::get("http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}");
        $weatherData = $weatherResponse->json();
        
        if (isset($weatherData['main']['temp'])) {
            $temperatureCelsius = $this->convertKelvinToCelsius($weatherData['main']['temp']);
            $weatherarray = [
                'eventId' => $eventId,
                'city' => $city,
                'temperatureCelsius' => $temperatureCelsius,
                'weatherDescription' => $weatherData['weather'][0]['description'],
            ];
            return $weatherarray;
        } else {
            $weatherarray = [
            'eventId' => $eventId,
            'city' => $city,
            'temperatureCelsius' => null,
            'weatherDescription' => 'Weather data not available',];
            return $weatherarray;
        }

    }

    private function convertKelvinToCelsius($temperatureKelvin)
    {
        return round($temperatureKelvin - 273.15, 2);
    }
}
