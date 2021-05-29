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



use App\User;
use App\Template;
use App\Module;
use App\Slider;
use App\Gallery;
use App\Testimonial;
use App\Social;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/admin/settings', 'AdminController@settings')->name('admin.settings');    
    Route::get('/testo', function () {
        $exitcode= Artisan::call('make:model Loopes');
    });
    });




