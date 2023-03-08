<?php

namespace App\Http\Controllers;

use App\Models\esp8266;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $apikey = null, $temperature = null)
    {
        $request_data = $request->only(['temperature', 'apikey']);
        $data['temperature'] = $temperature ?: $request_data['temperature'];
        $data['arduino_key'] = $apikey ?: $request_data['apikey'];
        $Validator = Validator::make($data,[
            'temperature'=>'required|numeric|between:0,99.99',
            'arduino_key'=>'required'
        ]);
        if($Validator->fails())
        {
            return response()->json(['error' => 'Formatos de los datos no válidos'], 400);
        }

        $apikey_exists = DB::table('channels')->where('arduino_key', '=' , $data['arduino_key'])->exists();
        if(!$apikey_exists)
        {
            return $this->toJson(['error' => 'ApiKey no válida'],'error');
        }

        $esp8266 = new esp8266;
        $esp8266->temperature = $data['temperature'];
        $esp8266->arduino_key = $data['arduino_key'];
        $esp8266->save();
        
        return $this->toJson(['message' => '¡Datos guardados correctamente!']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeesp8266Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actually(Request $request)
    {
        $data = $request->only(['apikey']);
        $temperatures = esp8266::where('arduino_key','=',$data['apikey'])->select('temperature', 'created_at')->latest('id')->first();
        return $this->toJson(['temperatures' => $temperatures]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\esp8266  $esp8266
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = $request->only(['apikey']);
        $temperatures = esp8266::where('arduino_key','=',$data['apikey'])->select('temperature', 'created_at')->get();
        return $this->toJson(['temperatures' => $temperatures]);
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
