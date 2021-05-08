<?php

use App\Http\Controllers\Api\HouseKeeping;
use App\Http\Controllers\Api\AuthController;
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

    //get employees
    Route::post('employees', [AuthController::class,"employees"]);
});
Route::prefix('kitchen')->group(function(){
    Route::post('login','Api\AuthController@kitchenLogin');
});
Route::prefix('guest')->group(function(){
    Route::post('login','Api\Kitchen\AuthController@guestLogin');
});
Route::middleware(['auth:api'])->group(function () {
    Route::prefix('kitchen')->group(function(){
        Route::prefix('menu')->group(function(){
            Route::get('','Api\Kitchen\MenuController@index');
        });
        Route::prefix('auth')->group(function(){
        
        });
    });
    Route::prefix("reservations")->group(function () {
        Route::post('add','Api\ReservationController@reservation');
        Route::get('','Api\ReservationController@reservationList');
        Route::get('single/{id}','Api\ReservationController@singleReservation');
        Route::get('all','Api\ReservationController@all');
    });

    Route::prefix("housekeeping")->group(function () {
        Route::get("",[HouseKeeping::class,"index"]);
        Route::get("current",[HouseKeeping::class,"current"]);
        Route::post("add",[HouseKeeping::class,"add"]);
        Route::post("changeStatus",[HouseKeeping::class,"changeStatus"]);
        Route::get("del/{id}",[HouseKeeping::class,"del"]);
    });

    Route::prefix('auth')->group(function () {
        Route::get('user', 'Api\AuthController@authUser');
    
    });
});

