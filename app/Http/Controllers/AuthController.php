<?php

namespace App\Http\Controllers;

use App\Http\Class\Passport;
use GuzzleHttp\Client;

class AuthController extends Passport
{
    public function register()
    {
        
    }

    public function ESP8266()
    {
        $url = env('APP_DEV_URL') ?: env('APP_URL');
        $guzzle = new Client;
        $response = $guzzle->post(strval($url . '/oauth/token'), [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env('OAUTH_CLIENT_ID_ESP8266'),
                'client_secret' => env('OAUTH_CLIENT_SECRET_ESP8266'),
                'scope' => '*',
            ]
        ]);
        return json_decode($response->getBody(), true);
    }
}