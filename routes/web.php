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

Route::view('/create-account', 'guest.create-account')
    ->name('create-account');
Route::post('/create-account', 'Web\CreateAccountWebController@index')
    ->name('create-account');

Route::view('/login', 'guest.login')
    ->name('login');
Route::post('/login', 'Web\LoginWebController@index')
    ->name('login');

Route::view('/dashboard', 'shared.dashboard')
    ->name('dashboard');

Route::view('/events', 'shared.event')
    ->name('events');

Route::view('/events/add', 'officer.add-event')
    ->name('add-event');
Route::post('/events/add', 'Web\AddEventWebController@index')
    ->name('add-event');

Route::view('/events/edit', 'officer.edit-event')
    ->name('edit-event');

