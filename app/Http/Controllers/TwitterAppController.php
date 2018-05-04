<?php

namespace App\Http\Controllers;

use App\FMTwitter;
use App\TwitterApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Thujohn\Twitter\Facades\Twitter;
use Illuminate\Support\Facades\Redirect;
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

    public function promoUserAuthCallback(Request $request){
        Twitter::reconfig($request->all());
        if(Session::has('oauth_request_token'))
        {
            $request_token = [
                'token'  => Session::get('oauth_request_token'),
                'secret' => Session::get('oauth_request_token_secret'),
            ];

            FMTwitter::reconfig($request_token);

            $oauth_verifier = false;

            if (Input::has('oauth_verifier'))
            {
                $oauth_verifier = Input::get('oauth_verifier');
                // getAccessToken() will reset the token for you
                $token = FMTwitter::getAccessToken($oauth_verifier);
            }

            if (!isset($token['oauth_token_secret']))
            {
                return Redirect::route('promo.error')->with('flash_error', 'We could not log you in on Twitter.');
            }

            $credentials = FMTwitter::getCredentials();

            if (is_object($credentials) && !isset($credentials->error))
            {
                // $credentials contains the Twitter user object with all the info about the user.
                // Add here your own user logic, store profiles, create new users on your tables...you name it!
                // Typically you'll want to store at least, user id, name and access tokens
                // if you want to be able to call the API on behalf of your users.

                // This is also the moment to log in your users if you're using Laravel's Auth class
                // Auth::login($user) should do the trick.

                Session::put('access_token', $token);

                return Redirect::to(route('promo', ['flash_notice' => "'Congrats! You\'ve successfully signed in!'"]));
            }

            return Redirect::route('promo.error')->with('flash_error', 'Crab! Something went wrong while signing you up!');


        }
    }

    public function promoUserAuthError(Request $request){

    }

    public function promoUserAuth(){
        $tapp = TwitterApp::GetRand();
        // your SIGN IN WITH TWITTER  button should point to this route
        $sign_in_twitter = true;
        $force_login = false;

        // dump(route('promo.callback', ['consumer_key' => $tapp->key ?? '', 'consumer_secret' => $tapp->secret ?? '']));
        // Make sure we make this request w/o tokens, overwrite the default values in case of login.
        FMTwitter::reconfig(['consumer_key' => $tapp->key ?? '', 'consumer_secret' => $tapp->secret ?? '', 'token' => '', 'secret' => '']);
        $token = FMTwitter::getRequestToken(route('promo.callback', ['consumer_key' => $tapp->key ?? '', 'consumer_secret' => $tapp->secret ?? '']));

        if (isset($token['oauth_token_secret']))
        {
            $url = Twitter::getAuthorizeURL($token, $sign_in_twitter, $force_login);

            Session::put('oauth_state', 'start');
            Session::put('oauth_request_token', $token['oauth_token']);
            Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

            return Redirect::to($url);
        }

        return Redirect::route('twitter.error');
    }
}
