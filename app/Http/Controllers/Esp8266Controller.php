<?php

namespace App\Http\Controllers;

use App\Models\esp8266;
use App\Http\Requests\Storeesp8266Request;
use App\Http\Requests\Updateesp8266Request;

class Esp8266Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$esp8266 = esp8266::select('id', 'user_id')->where('id',1)->get();
        $esp8266s = esp8266::all();
        return response()->json($esp8266s,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateesp8266Request  $request
     * @param  \App\Models\esp8266  $esp8266
     * @return \Illuminate\Http\Response
     */
    public function update(Updateesp8266Request $request, esp8266 $esp8266)
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
