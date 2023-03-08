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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
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
    public function show()
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
