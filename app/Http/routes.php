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

#######################################
# Explicit routes for all GET functions
# home directory
Route::get('/', 'P3Controller@getIndex');

# lorem Ipsum
Route::get('/lorem-ipsum', 'P3Controller@getLoremGenerator');

# Random User Generator
Route::get('/user-generator', 'P3Controller@getUserGenerator');

# Permission Calculator: Octal Encoder, Octal Decoder
Route::get('/permissions-calculator', 'P3Controller@getOctalEncoder');
Route::get('/permissions-calculator/decoder', 'P3Controller@getOctalDecoder');

# Color Picker: Convert RGB to HEX, Color Palette Picker, HEX to RGB
Route::get('/color-picker', 'P3Controller@getColorPickerValue');
Route::get('/color-picker/picker', 'P3Controller@getColorPickerPick');
Route::get('/color-picker/hex', 'P3Controller@getColorPickerHEX');

# xkcd generator integrated from P2
Route::get('/xkcd-generator', 'P3Controller@getXkcdGenerator');

########################################
# Explicit routes for all POST functions
# lorem Ipsum
Route::post('/lorem-ipsum', 'P3Controller@postLoremGenerator');
# Random User Generator
Route::post('/user-generator', 'P3Controller@postUserGenerator');

# Permission Calculator: Octal Encoder, Octal Decoder
Route::post('/permissions-calculator', 'P3Controller@postOctalEncoder');
Route::post('/permissions-calculator/decoder', 'P3Controller@postOctalDecoder');

# Color Picker: Convert RGB to HEX, Color Palette Picker, HEX to RGB
Route::post('/color-picker', 'P3Controller@postColorPickerValue');
Route::post('/color-picker/picker', 'P3Controller@postColorPickerPick');
Route::post('/color-picker/hex', 'P3Controller@postColorPickerHEX');

# xkcd generator integrated from P2
Route::post('/xkcd-generator', 'P3Controller@postXkcdGenerator');
