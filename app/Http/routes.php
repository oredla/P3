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

###############################################################################
# Explicit routes for all GET functions
################################################################################
# home directory
Route::get('/', 'P3Controller@getIndex');

# lorem Ipsum
Route::get('/lorem-ipsum', 'LoremController@getLoremGenerator');

# Random User Generator
Route::get('/user-generator', 'UserController@getUserGenerator');

# Permission Calculator: Octal Encoder, Octal Decoder
Route::get('/permissions-calculator', 'PermissionController@getOctalEncoder');
Route::get('/permissions-calculator/decoder', 'PermissionController@getOctalDecoder');

# Color Picker: Convert RGB to HEX, Color Palette Picker, HEX to RGB
Route::get('/color-picker', 'ColorController@getColorPickerValue');
Route::get('/color-picker/picker', 'ColorController@getColorPickerPick');
Route::get('/color-picker/hex', 'ColorController@getColorPickerHEX');

# xkcd generator integrated from P2
Route::get('/xkcd-generator', 'XkcdController@getXkcdGenerator');

################################################################################
# Explicit routes for all POST functions
################################################################################
# lorem Ipsum
Route::post('/lorem-ipsum', 'LoremController@postLoremGenerator');
# Random User Generator
Route::post('/user-generator', 'UserController@postUserGenerator');

# Permission Calculator: Octal Encoder, Octal Decoder
Route::post('/permissions-calculator', 'PermissionController@postOctalEncoder');
Route::post('/permissions-calculator/decoder', 'PermissionController@postOctalDecoder');

# Color Picker: Convert RGB to HEX, Color Palette Picker, HEX to RGB
Route::post('/color-picker', 'ColorController@postColorPickerValue');
Route::post('/color-picker/picker', 'ColorController@postColorPickerPick');
Route::post('/color-picker/hex', 'ColorController@postColorPickerHEX');

# xkcd generator integrated from P2
Route::post('/xkcd-generator', 'XkcdController@postXkcdGenerator');
