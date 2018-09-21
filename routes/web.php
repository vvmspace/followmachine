<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth', function (){
    return 'Twitter auth route.';
});

Route::prefix('/promo')->group(function(){
    Route::get('/', function(){
        return 'promo';
    })->name('promo');
   Route::get('auth/callback', 'TwitterAppController@promoUserAuthCallback')->name('promo.callback');
   Route::get('auth/error', 'TwitterAppController@promoUserAuthError')->name('promo.error');
   Route::get('auth', 'TwitterAppController@promoUserAuth');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
