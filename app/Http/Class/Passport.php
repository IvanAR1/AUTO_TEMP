<?php

namespace App\Http\Class;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatorUser;
use Illuminate\Support\Facades\Hash;

class Passport extends Controller
{
    public function login(Request $request)
    {
        $data = $request->only(['email', 'password']);
        new ValidatorUser('login', $data);

        $user = User::where("email", "=" , $data['email'])->first();
        if(isset($user->id))
        {
            if(Hash::check($data['password'], $user->password))
            {
                $token = $user->createToken("auth_token")->accessToken;
                $json['access_token'] = $token;
                $json['status'] = 'OK';
            }
            else
            {
                $json['message'] = 'Las credenciales no son válidas';
                $json['status'] = 'error';
            }
        }
        else
        {
            $json['message'] = 'Las credenciales no son válidas';
            $json['status'] = 'error';
        }
        return $this->toJson($json, $json['status']);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return $this->specialJSON(auth()->user());
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        $data = array('message' => 'Cierre de sesión satisfactorio');
        return $this->toJson($data);
    }

    public function checkToken()
    {
        if(auth('sanctum')->check() == true)
        {
            $data = array('message'=>'Token válido');
            return $this->toJson($data);
        }
    }
}