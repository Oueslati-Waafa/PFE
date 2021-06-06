<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'paiement'], function () {
  
   Route::delete("delete_paiement/{id}", "PaiementController@deletePaiement");
   Route::get("getPaiment", "PaiementController@getAll");
   Route::get('get_paiement/{id}', 'PaiementController@getPaiement');
   Route::post('update_paiement/{id}', "PaiementController@updatePaiement");
   Route::post('save_paiement', "PaiementController@savePaiement");
  });
  
  Route::group(['prefix' => 'heures_supp'], function () {
  
    Route::delete("delete_heure_sup/{id}", "HeureSuppController@deleteHeures");;
    Route::get("get", "HeureSuppController@getAll");
    Route::get('get_heure_supp/{id}', 'HeureSuppController@getHeures');
    Route::post('save_heure_supp/{id}', "HeureSuppController@updateHeures");
    Route::post('save_heure_supp', "HeureSuppController@saveHeures");
   });
