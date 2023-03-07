<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;
use RuntimeException;

class ValidatorUser
{
    private array $login = array(
        'email' => 'required|email',
        'password' => 'required|min:8',
    );

    private array $ESP8266 = array(
        'user_name' => 'required',
        'user_email' => 'required|email'
    );

    public function __construct(string $case = null, array $credentials = null)
    {
        if(is_null($case) || empty($credentials))
        {
            throw new RuntimeException("Users validators not maybe empty");
        }
        switch($case)
        {
            case 'login':
                return $this->Validator($credentials, $this->login);
                break;
            case 'esp8266':
                return $this->Validator($credentials, $this->ESP8266);
                break;
        }
    }

    private function Validator(array $credentials, array $rules)
    {
        $Validator = Validator::make($credentials, $rules);
        if($Validator->fails())
        {
            throw new HttpResponseException(response()->json(['error' => 'Datos no válidos'], 400));
        }
    }
}