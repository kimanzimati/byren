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

Route::get('/','HomeController@index');
Route::get('/product','ProductController@index');
Route::get('/product/{slug}', 'ProductController@show');
Route::post('/product', 'ProductController@store');
Route::get('/product/create', 'ProductController@create');
Route::get('/product/{id}', 'ProductController@show');
Route::get('/product/{id}/edit', 'ProductController@edit');
Route::put('/product/{id}', 'ProductController@update');
Route::delete('/product/{id}', 'ProductController@destroy');

Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@store');
Route::delete('/cart/{id}', 'CartController@destroy');
Route::post('/cart/saveForLater', 'CartController@saveForLater');


Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin');
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration');
Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');


Route::get('/forsale','ForSaleController@index');
Route::get('/forsale/{slug}', 'ForSaleController@show');

//render in view contact us
Route::get('/contact', [
    'uses' => 'ContactUsFormController@createForm'
]);

//post form data
Route::post('/contact', [
    'uses'=> 'ContactUsFormController@ContactUsForm',
    'as' => 'contact.store'
]);
//create model for the cart-missing
Route::get('/cart/empty', function () {
    Cart::destroy();
});


Auth::routes();
