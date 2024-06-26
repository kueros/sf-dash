<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateController;
use App\Http\Controllers\User2Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConfigController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
	return view('auth.login');
});

Auth::routes();

Route::resource('states', StateController::class);

Route::resource('users', UserController::class);

Route::resource('configs', ConfigController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('webhooks')->namespace('App\Http\Controllers')->name('webhooks/')->middleware('auth')->group(static function() {
	Route::get('/{id}', 'WebhooksController@index')->name('index');
});

Route::prefix('stores')->namespace('App\Http\Controllers')->name('stores/')->middleware('auth')->group(static function () {
	Route::get('/', 'StoresController@index')->name('index');
	Route::get('/show/{id}', 'StoresController@show')->name('show');
});

Route::prefix('carriers')->namespace('App\Http\Controllers')->name('carriers/')->middleware('auth')->group(static function() {
	Route::get('/{id}', 'CarriersController@index')->name('index');
});

Route::prefix('order_in')->namespace('App\Http\Controllers')->name('order_in/')->middleware('auth')->group(static function () {
	Route::get('/', 'OrderInController@index')->name('index');
});

Route::prefix('orders_detail')->namespace('App\Http\Controllers')->name('orders_detail/')->middleware('auth')->group(static function() {
	Route::get('/{id}',                                             'OrdersDetailController@index')->name('index');
});


