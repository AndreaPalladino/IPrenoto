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
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/modifica/{booking}', 'HomeController@edit')->name('edit');
Route::put('/modifica/{booking}/update', 'HomeController@update')->name('booking.update');
Route::delete('/cancella/{booking}', 'HomeController@deleteBooking')->name('booking.delete');

/* MANAGER */
Route::get('/manager/carica', 'ManagerController@create')->name('manager.create');
Route::post('/manager/locationStore', 'ManagerController@storeLoc')->name('manager.store');
Route::get('/manager/{name}/{id}/prenotazioni', 'ManagerController@prenotazioni')->name('manager.booking');
Route::get('/manager/{location}/edit', 'ManagerController@locEdit')->name('manager.edit');
Route::put('/manager/{location}/update', 'ManagerController@locUpdate')->name('manager.update');
Route::delete('/manager/{location}/delete', 'ManagerController@locDelete')->name('manager.delete');