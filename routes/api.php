<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "vt"], function(){
    /**
     *
     */
    Route::get("/one-day-ranking", "vtController@oneDayRanking");
    Route::get("/three-day-ranking", "vtController@threeDayRanking");
    Route::get("/seven-day-ranking", "vtController@sevenDayRanking");
    Route::get("/one-day-subscribe-ranking", "vtController@oneDaySubscribeRanking");
    Route::get("/three-day-subscribe-ranking", "vtController@threeDaySubscribeRanking");
    Route::get("/seven-day-subscribe-ranking", "vtController@sevenDaySubscribeRanking");
});