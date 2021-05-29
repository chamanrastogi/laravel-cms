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
    Route::patch('/admin/gallery/status/{id}', 'GalleryController@statuscheck')->name('gallery.status'); 
    Route::resource('/admin/gallery', 'GalleryController'); 
});



