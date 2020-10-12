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

    return view('welcome');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {


    Route::get('/login', 'AuthController@login')->name('admin.login');
    Route::post('/login', 'AuthController@loginPost')->name('admin.login.post');
    Route::get('/logout', 'AuthController@logout')->name('admin.logout');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');


        Route::group(['prefix' => 'products'], function () {

            Route::get('/', 'ProductController@products')->name('admin.products');
            Route::get('show/{id}', 'ProductController@productShow')->name('admin.products.show');
            Route::get('create', 'ProductController@productCreate')->name('admin.products.create');
            Route::post('create', 'ProductController@productStore')->name('admin.products.store');
            Route::get('edit/{id}', 'ProductController@productEdit')->name('admin.products.edit');
            Route::post('edit/{id}', 'ProductController@productUpdate')->name('admin.products.editPost');
            Route::post('delete/{id}', 'ProductController@productDelete')->name('admin.products.delete');

        });

    });
});


Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang') : '';
    $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
    return back();
});
