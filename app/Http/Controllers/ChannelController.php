<?php

namespace App\Http\Controllers;

use App\Models\channel;
use App\Http\Requests\StorechannelRequest;
use App\Http\Requests\UpdatechannelRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
    public function create(Request $request)
    {
        $data = $request->only(['name','description','user_id']);

        $Validator = Validator::make($data,[
            'name'=>'required|regex:/^([a-z ñáéíóú]{1,100})$/i|max:255',
            'description'=>'required|regex:/^([a-z ñáéíóú]{1,100})$/i|max:255',
        ]);
        

        if($Validator->fails())
        {
            return response()->json(['error' => 'Datos no válidos'], 400);
        }

        $array = array_merge($data, ['arduino_key'=>str::random(10)]);
        $channel = new channel;
        $channel->name = $array['name'];
        $channel->description = $array['description'];
        $channel->arduino_key = $array['arduino_key'];
        $channel->save();
        
        $user_channel['user_id'] = Auth::id()  ?: $data['user_id'];
        $user_channel['channel_id'] = $channel->id;
        $user_channel['created_at'] = now();
        $user_channel['updated_at'] = now();
        DB::table('user_channels')->insert($user_channel);

        return response()->json('Datos guardados correctamente');
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
