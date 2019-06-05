<?php

Route::get('/', function () {
    return view('welcome');
});

//ADMIN
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::name('admin.')->prefix('admin')->middleware(['auth', 'check_role:admin'])->group(function () {
    Route::get('home', 'Admin\HomeController@index')->name('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
