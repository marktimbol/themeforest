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

Route::post(
    'stripe/webhook',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('/', 'PagesController@index');
Route::resource('items', 'ItemsController', [
	'only'	=> ['index', 'show']
]);

Route::get('cart', 'CartController@index');
Route::post('cart', 'CartController@store');
Route::get('checkout', 'CheckoutController@index');
Route::post('checkout', 'CheckoutController@store');
