<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('form', 'FormSessionController');

Route::group(['prefix' => 'session'], function () {
    Route::resource('personal-info', 'PersonalInputController');
    Route::resource('contact-input', 'ContactInputController');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
