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


# Explicit routes for Lorem Ipsum
Route::get('/', 'P3Controller@getIndex');
Route::get('/lorem-ipsum', 'P3Controller@getLoremGenerator');
Route::get('/user-generator', 'P3Controller@getUserGenerator');
Route::get('/octal-decoder', 'P3Controller@getOctalDecoder');
Route::get('/color-picker', 'P3Controller@getColorPicker');

// Route::get('/', function () {
//     return view('welcome');
// });
//
// Route::get('/lorem-ipsum', function() {
//   return 'Lorem Ipsum Page';
// });
//
// Route::get('/user-generator', function() {
//   return 'Random User Generator with P1 Random Password Generator';
// });
//
// Route::get('/decode-octal', function() {
//   return 'Decode Octal Notation';
// });
