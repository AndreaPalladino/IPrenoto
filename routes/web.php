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



Auth::routes();

/* TUTTI */
Route::get('/', 'PublicController@index')->name('homepage');


/* UTENTI LOGGATI */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/prenota', 'HomeController@prenota')->name('prenota');
Route::post('/prenota/post', 'HomeController@bookingStore')->name('booking.store');

/* MANAGER */
Route::get('/manager/carica', 'ManagerController@create')->name('manager.create');
Route::post('/manager/locationStore', 'ManagerController@storeLoc')->name('manager.store');