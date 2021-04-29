<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'Api\AuthController@emaillogin');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::post('old-guest','Api\AuthController@oldUser');
    Route::get('rooms', 'Api\RoomController@rooms');
    Route::post('guest','Api\ReservationController@guest');
    Route::get('paid-services','Api\ReservationController@paidServices');
});
Route::prefix("reservations")->middleware('auth:api')->group(function () {
    Route::post('add','Api\ReservationController@reservation');
    Route::get('','Api\ReservationController@reservationList');
    Route::get('single/{id}','Api\ReservationController@singleReservation');
    Route::get('all','Api\ReservationController@all');
});
Route::prefix('auth')->middleware('auth:api')->group(function () {
    Route::get('user', 'Api\AuthController@authUser');

});

