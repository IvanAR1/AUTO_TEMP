<?php

namespace App\Http\Controllers;

use App\Models\channel;
use App\Http\Requests\StorechannelRequest;
use App\Http\Requests\UpdatechannelRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorechannelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorechannelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(channel $channel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(channel $channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatechannelRequest  $request
     * @param  \App\Models\channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['name','description']);

        $Validator = Validator::make($data,[
            'name'=>'regex:/^([a-z ñáéíóú]{1,100})$/i|max:255',
            'description'=>'required|regex:/^([a-z ñáéíóú]{1,100})$/i|max:255',
        ]);
        

        if($Validator->fails())
        {
            return response()->json(['error' => 'Datos no válidos'], 400);
        }

        $array = array_merge($data, ['arduino_uno'=>str::random(10)]);
        $channel = Channel::findOrFail($id);
        $channel->update($array);
        return response()->json('Datos guardados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(channel $channel)
    {
        //
    }
}
