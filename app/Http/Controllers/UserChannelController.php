<?php

namespace App\Http\Controllers;

use App\Models\UserChannel;
use App\Http\Requests\StoreUserChannelRequest;
use App\Http\Requests\UpdateUserChannelRequest;
use Illuminate\Support\Facades\Auth;

class UserChannelController extends Controller
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
     * @param  \App\Http\Requests\StoreUserChannelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserChannelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserChannel  $UserChannel
     * @return \Illuminate\Http\Response
     */
    public function show($user_id = null)
    {
        $userID = $user_id ?: Auth::id();
        $data = UserChannel::where('user_id','=',$userID)->leftJoin('channels', function($join)
        {
            $join->on('channels.id', '=', 'user_channels.channel_id');
        })->select('channels.id as channel_id','channels.name','channels.description','channels.arduino_key')
          ->orderBy('channel_id','asc')
          ->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserChannel  $UserChannel
     * @return \Illuminate\Http\Response
     */
    public function edit(UserChannel $UserChannel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserChannelRequest  $request
     * @param  \App\Models\UserChannel  $UserChannel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserChannelRequest $request, UserChannel $UserChannel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserChannel  $UserChannel
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserChannel $UserChannel)
    {
        //
    }
}
