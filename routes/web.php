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

    //PRODUCT
    Route::get('product/create', 'Admin\ProductController@create')->name('product.create');
    Route::post('product/store', 'Admin\ProductController@store')->name('product.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
