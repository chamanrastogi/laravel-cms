<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
  'register' => true, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/thanks', 'HomeController@thanks')->name('thanks');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/page/{slug}', 'HomeController@show')->name('page');

