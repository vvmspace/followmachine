<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAndTwitter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('twitter_username')->nullable();
            $table->string('twitter_id')->nullable();
            $table->string('twitter_key')->nullable();
            $table->string('twitter_secret')->nullable();
            $table->string('twitter_app_key')->nullable();
            $table->string('twitter_app_secret')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
           $table->dropColumn(['twitter_username', 'twitter_id', 'twitter_key', 'twitter_secret', 'twitter_app_secret', 'twitter_app_key']);
        });
    }
}
