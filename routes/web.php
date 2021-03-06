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
    return redirect()->to('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('product-variant', 'VariantController');
    Route::post('/product/{id}/edit','ProductController@update');
    Route::resource('product', 'ProductController');
    Route::get('/variant-delete/{id}', 'ProductController@variant_delete');
    Route::get('/search', 'ProductController@search')->name('search');
    Route::resource('blog', 'BlogController');
    Route::resource('blog-category', 'BlogCategoryController');

    Route::post('/upload-image', 'ProductController@uploadImage');
    Route::post('/delete-image', 'ProductController@deleteImage');
});
