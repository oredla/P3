<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


# Explicit routes for all GET functions
Route::get('/', 'P3Controller@getIndex');
Route::get('/lorem-ipsum', 'P3Controller@getLoremGenerator');
Route::get('/user-generator', 'P3Controller@getUserGenerator');
Route::get('/octal-decoder', 'P3Controller@getOctalDecoder');
Route::get('/color-picker', 'P3Controller@getColorPicker');
Route::get('/xkcd-generator', 'P3Controller@getXkcdGenerator');

# Explicit routes for all POST functions
Route::post('/lorem-ipsum', 'P3Controller@postLoremGenerator');
Route::post('/user-generator', 'P3Controller@postUserGenerator');
Route::post('/octal-decoder', 'P3Controller@postOctalDecoder');
Route::post('/color-picker', 'P3Controller@postColorPicker');
Route::post('/xkcd-generator', 'P3Controller@postXkcdGenerator');
