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
    Route::get('/admin/template/settings', 'TemplateController@index')->name('template.settings');
    Route::patch('/admin/template/update', 'TemplateController@update')->name('template.update');
});


