<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 24/08/2018
 * Time: 5:31 PM
 */
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use PHPHtmlParser\Dom;

class WeatherController extends Controller {

    public function weather(){
        error_reporting(E_ALL & ~E_WARNING);
        $client = new Client(['base_uri' => 'https://www.gismeteo.ua/']);
        $headers = ["Accept" => "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
            "Accepting-Encoding" => "gzip, deflate, br",
            "Accepting-Language" => "ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3",
            "Host"=>"www.gismeteo.ua",
            "User-Agent"=> "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0"];

        $response = $client->request('GET', 'weather-zaporizhia-5093',["headers" => $headers]);

        $dom = new Dom();
        $dom->load($response->getBody()->getContents());
        $weather_short = $dom->find("#tab_wdaily1");
        $weather_detailed = $dom->find(".wsection");

        $data["short"] = $weather_short;
        $data["detailed"] = $weather_detailed;

        return View("weather/weather",["data" => $data]);
    }

}