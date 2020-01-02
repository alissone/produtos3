<?php

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

Route::get(
    '/', function () {
        return view('welcome');
    }
);

Route::get(
    '/insert', function () {
    return view('/products/insert');
}
);

//Route::get('products/{id}/edit', function ($id) {
//    return view('/products/edit');
//}
//)->where('id', '[0-9]+');

Route::resource('products', 'ProductController');
