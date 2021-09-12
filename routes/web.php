<?php

use Illuminate\Support\Facades\Route;

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
    return view('guest.landing-page');
})->name('landing-page');

Route::view('/create-account', 'guest.create-account')->name('create-account');
Route::post('/create-account', 'Web\CreateAccountWebController@index')->name('create-account');

Route::get('/login', function () {
    return view('guest.login');
});


