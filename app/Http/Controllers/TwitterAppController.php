<?php

namespace App\Http\Controllers;

use App\TwitterApp;
use Illuminate\Http\Request;

class TwitterAppController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TwitterApp  $twitterApp
     * @return \Illuminate\Http\Response
     */
    public function show(TwitterApp $twitterApp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TwitterApp  $twitterApp
     * @return \Illuminate\Http\Response
     */
    public function edit(TwitterApp $twitterApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TwitterApp  $twitterApp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TwitterApp $twitterApp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TwitterApp  $twitterApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(TwitterApp $twitterApp)
    {
        //
    }

    public function promoUserAuth(){
        return 'TwitterAppController@promoUserAuth';
    }
}
