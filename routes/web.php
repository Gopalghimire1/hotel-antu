<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\BlogController;

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

route::name('front.')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('singleroom/{id}', [HomeController::class, 'singleroom'])->name('singleroom');
    Route::get('view', [HomeController::class, 'gallery'])->name('gallery');
    Route::get('suites', [HomeController::class, 'suites'])->name('suites');
    Route::get('blog/all/{type}', [HomeController::class, 'blog'])->name('blog');
    Route::get('blog/single/{blog}', [HomeController::class, 'blogSingle'])->name('blogSingle');
    Route::match(['GET','POST'],'book', [BookController::class, 'index'])->name('book');
    Route::post('getroom', [BookController::class, 'getRoom'])->name('getroom');
    Route::get('experience', [HomeController::class, 'experience'])->name('experience');

});

Route::get('/pass',function(){
    $pass = bcrypt('admin');
    return $pass;
});


Route::match(['get', 'post'], 'login', 'AuthController@login')->name('login');
Route::match(['get', 'post'], 'logout', 'AuthController@logout')->name('logout');

Route::group([ 'middleware' => 'role:super','prefix'=>'admin'], function(){

        Route::get('','Admin\AdminController@index')->name('super.dashboard');
       // guest route
        Route::get('/guests','Admin\GuestController@index')->name('guest.list');
        Route::get('/guest/create','Admin\GuestController@create')->name('guest.create');
        Route::post('/guest/store','Admin\GuestController@store')->name('guest.store');
        Route::resource('amenities', 'Admin\AmenitiesController');
        Route::resource('floors', 'Admin\FloorsController');

       //  room type
        Route::get('/room-types','Admin\RoomTypeController@index')->name('roomType.index');
        Route::get('/room-type/create','Admin\RoomTypeController@create')->name('roomType.create');
        Route::post('/room-type/store','Admin\RoomTypeController@store')->name('roomType.store');
        Route::post('/room-type/image','Admin\RoomTypeController@imageUpload')->name('roomType.image');
        Route::get('/room-type/{roomType}/edit','Admin\RoomTypeController@edit')->name('roomType.edit');
        Route::put('/room-type/{roomType}/update','Admin\RoomTypeController@update')->name('roomType.update');
        Route::get('/room-type/{roomType}/show','Admin\RoomTypeController@show')->name('roomType.show');
        Route::get('/room-type/{roomType}/image/{image}','Admin\RoomTypeController@setImageFeatured')->name('image.featured');
        Route::get('/room-type/{roomType}/image/delete/{image}','Admin\RoomTypeController@deleteImage')->name('image.delete');

       // room
        Route::get('/rooms','Admin\RoomController@index')->name('rooms.index');
        Route::get('/room/create','Admin\RoomController@create')->name('rooms.create');
        Route::post('/room/store','Admin\RoomController@store')->name('rooms.store');
        Route::get('/room/{room}/edit','Admin\RoomController@edit')->name('rooms.edit');
        Route::post('/room/{room}/update','Admin\RoomController@update')->name('rooms.update');

        // paid services
        Route::prefix('paid-service')->name('paid.')->group(function () {
            Route::get('','Admin\PaidserviceController@index')->name('index');
            Route::get('create','Admin\PaidserviceController@create')->name('create');
            Route::post('store','Admin\PaidserviceController@store')->name('save');
            Route::get('{id}/edit','Admin\PaidserviceController@edit')->name('edit');
            Route::post('{id}/update','Admin\PaidserviceController@update')->name('update');
            Route::get('{id}/delete','Admin\PaidserviceController@delete')->name('delete');
            Route::get('{id}/show','Admin\PaidserviceController@show')->name('show');

        });

        route::name('admin.')->group(function () {
            route::name('config.')->group(function () {
                route::prefix('config')->group(function () {
                    Route::get('', [ConfigController::class, 'index'])->name('home');
                    Route::post('add', [ConfigController::class,'add'])->name('add');
                    Route::post('update', [ConfigController::class,'update'])->name('update');
                    Route::get('del/{id}', [ConfigController::class,'del'])->name('del');
                });
            });
            route::name('gallery.')->group(function () {
                route::prefix('gallery')->group(function () {
                    Route::get('', [GalleryController::class, 'index'])->name('home');
                    Route::post('add', [GalleryController::class,'add'])->name('add');
                    Route::get('del/{id}', [GalleryController::class,'del'])->name('del');
                });
            });

            route::name('blog.')->group(function () {
                route::prefix('blog')->group(function () {
                    Route::get('list/{type}', [BlogController::class, 'index'])->name('home');
                    Route::match(['GET','POST'],'add/{type}', [BlogController::class,'add'])->name('add');
                    Route::match(['GET','POST'],'imageupload', [BlogController::class,'imageupload'])->name('imageupload');
                    Route::match(['GET','POST'],'update/{blog}', [BlogController::class,'update'])->name('update');
                    Route::get('del/{blog}', [BlogController::class,'del'])->name('del');
                });
            });

        });



        Route::prefix('reservation')->name('reservation.')->group(function () {
            Route::get('','Admin\ReservationController@index')->name('index');
            Route::get('create','Admin\ReservationController@create')->name('create');
        });

});
