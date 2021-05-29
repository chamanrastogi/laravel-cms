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



Route::group(['middleware' => ['role:super-admin','auth']], function () {
    Route::patch('/admin/social/status/{id}', 'SocialController@statuscheck')->name('social.status'); 
    Route::resource('/admin/social', 'SocialController'); 
});


