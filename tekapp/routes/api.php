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

   Route::group(['prefix' => 'contracts'], function () {
  
    Route::delete("delete_contract/{id}", "ContractsController@deleteContract");;//done
    Route::get("get", "ContractsController@getAll");//done
    Route::get('get_contracts/{id}', 'ContractsController@getContracts');
    Route::post('save_contracts/{id}', "ContractsController@updateContracts");
    Route::post('save_contracts', "ContractsController@saveContract");//done
   });

   Route::group(['prefix' => 'bilans'], function () {
  
    Route::delete("delete_bilan/{id}", "BilanModuleController@deleteBilan");;//done
    Route::get("get", "BilanModuleController@getAll");//done
    Route::get('get_bilan/{id}', 'BilanModuleController@getBilan');
    Route::post('save_bilan/{id}', "BilanModuleController@updateBilan");
    Route::post('save_bilan', "BilanModuleController@saveBilan");//done
   });

    Route::group(['prefix' => 'prix'], function () {
  
    Route::delete("delete_prix/{id}", "PrixHeureController@deletePrix");;//done
    Route::get("get", "PrixHeureController@getAll");//done
    Route::get('get_prix/{id}', 'PrixHeureController@getPrix');
    Route::post('save_prix/{id}', "PrixHeureController@updatePrix");
    Route::post('save_prix', "PrixHeureController@savePrix");//done
   });

   Route::group(['prefix' => 'professor'], function () {
  
    Route::get("get", "ProfessorController@all");//done
    Route::get('get_professor/{id}', 'ProfessorController@getProfessor');
   });