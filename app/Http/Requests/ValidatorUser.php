<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;
use RuntimeException;

class ValidatorUser
{
    private array $login = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function __construct(string $case = null, array $credentials = null)
    {
        if(is_null($case) || is_null($credentials))
        {
            throw new RuntimeException('Las validaciones de usuario no pueden quedar nulas');
        }
        switch($case)
        {
            case 'login':
                return $this->Validator($credentials, $this->login);
                break;
        }
    }

    private function Validator(array $credentials, $rules)
    {
        $Validator = Validator::make($credentials, $rules);
        if($Validator->fails())
        {
            throw new HttpResponseException(response()->json(['error' => 'El correo y contraseña deben ser válidos.']));
        }
    }
}