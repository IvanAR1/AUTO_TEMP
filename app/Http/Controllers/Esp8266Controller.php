<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\esp8266;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Storeesp8266Request;

class Esp8266Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $esp8266s = esp8266::where('user_id', '=', Auth::id())->get();
        if($esp8266s->isEmpty())
        {
            return $this->toJson(['message'=>'¡Manda tus primeros datos desde arduino!'],'error');
            exit;
        }
        return $this->toJson(['message'=>$esp8266s]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->only(['user_name', 'user_email', 'temperature']);
        $user = User::where("alias_user", "=" , $data['user_name'])
                      ->where("email", "=" , $data['user_email'])
                      ->first();
        esp8266::updateOrCreate(['user_id'=>$user->id],
        [
            'temperature'=>$data['temperature'],
            'user_id'=>$user->id
        ]);
        return $this->toJson(['message'=>'Datos almacenados correctamente']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeesp8266Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeesp8266Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\esp8266  $esp8266
     * @return \Illuminate\Http\Response
     */
    public function show(esp8266 $esp8266)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\esp8266  $esp8266
     * @return \Illuminate\Http\Response
     */
    public function edit(esp8266 $esp8266)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\esp8266  $esp8266
     * @return \Illuminate\Http\Response
     */
    public function destroy(esp8266 $esp8266)
    {
        //
    }
}
