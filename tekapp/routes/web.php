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

Route::group(['prefix' => 'paiement'], function () {
    Route::post("/add", "PaiementController@add");
    Route::delete("/delete", "PaiementController@delete");
    Route::get("/", "PaiementController@getAll");
    Route::put('/edit', 'PaiementController@edit');
    Route::post("/{id}", "PaiementController@get");
  });
