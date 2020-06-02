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
    return view('welcome');
});
/*_______________________________________INDEX____________________________________*/
Route::get('/users','UserControllerr@index');/*index Users*/
Route::get('/products', 'ProductController@index');/*index Products*/
Route::get('/providers', 'ProviderController@index');/*index Providers*/
Route::get('/products/buscador', 'ProductController@buscador');/*index Products Buscador*/

//Route::get('/products/buscador', 'ProductController@buscadorPR');/*index Products Buscador*/
//Route::get('/products/buscador', 'ProductController@buscadorCD');/*index Products Buscador*/
//Route::get('/products/buscador', 'ProductController@buscadorPA');/*index Products Buscador*/

Route::get('/products/show_car', 'ProductController@showCar');/*index Products showCar*/
/*_______________________________________EDIT____________________________________*/
Route::get('/products/{id}/edit', 'ProductController@edit');/*edit products*/
Route::get('/providers/{id}/edit', 'ProviderController@edit');/*edit providers*/
/*_______________________________________CREATE____________________________________*/
Route::get('/products/create', 'ProductController@create');/*create products*/
Route::get('/providers/create', 'ProviderController@create');/*create provider*/
Route::get('/purchases/create', 'PurchaseController@create');/*create purchases*/
/*_______________________________________STORE____________________________________*/
Route::post('/products', 'ProductController@store');/*store products*/
Route::post('/providers', 'ProviderController@store');/*store providers*/
/*_______________________________________UPDATE____________________________________*/
Route::put('/products/{id}', 'ProductController@update');/*update products*/
Route::put('/providers/{id}', 'ProviderController@update');/*update providers*/
/*_______________________________________DELETE____________________________________*/
Route::delete('/products/{id}', 'ProductController@destroy');/*delete products*/
Route::delete('/providers/{id}', 'ProviderController@destroy');/*delete providers*/


