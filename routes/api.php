<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('checkUserMobileExist','Api\GeneralController@checkUserMobileExist');
Route::post('checkVerificationCode','Api\GeneralController@checkVerificationCode');
Route::post('userSignUp','Api\GeneralController@userSignUp');
Route::post('userLogin ','Api\GeneralController@login');


Route::group(['middleware' => 'auth:api'], function () {
    Route::post('getCategories','Api\PlacesController@getCategories');
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
