<?php

Route::get('/', function () {
    return view('index');
})->name('home');

Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');
