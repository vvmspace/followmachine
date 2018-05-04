<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterApp extends Model
{
    static function GetRand(){
        return TwitterApp::inRandomOrder()->first();
    }
}
