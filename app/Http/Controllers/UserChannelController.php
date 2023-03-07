<?php

namespace App\Http\Controllers;

use App\Models\user_channel;
use App\Http\Requests\Storeuser_channelRequest;
use App\Http\Requests\Updateuser_channelRequest;

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
     * @param  \App\Http\Requests\Storeuser_channelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeuser_channelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_channel  $user_channel
     * @return \Illuminate\Http\Response
     */
    public function show(user_channel $user_channel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_channel  $user_channel
     * @return \Illuminate\Http\Response
     */
    public function edit(user_channel $user_channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_channelRequest  $request
     * @param  \App\Models\user_channel  $user_channel
     * @return \Illuminate\Http\Response
     */
    public function update(Updateuser_channelRequest $request, user_channel $user_channel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_channel  $user_channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_channel $user_channel)
    {
        //
    }
}
