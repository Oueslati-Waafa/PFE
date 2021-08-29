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


  //paiement routes 
  Route::group(['prefix' => 'paiement'], function () {
  
   Route::delete("delete_paiement/{id}", "PaiementController@deletePaiement");
   Route::get("getPaiment", "PaiementController@getAll");
   Route::get('get_paiement/{id}', 'PaiementController@getPaiement');
   Route::post('update_paiement/{id}', "PaiementController@updatePaiement");
   Route::post('save_paiement', "PaiementController@savePaiement");
  });

  //Heures supp routes
  
  Route::group(['prefix' => 'heures_supp'], function () {
  
    Route::delete("delete_heure_sup/{id}", "HeureSuppController@deleteHeures");;
    Route::get("get", "HeureSuppController@getAll");
    Route::get('get_heure_supp/{id}', 'HeureSuppController@getHeures');
    Route::post('save_heure_supp/{id}', "HeureSuppController@updateHeures");
    Route::post('save_heure_supp', "HeureSuppController@saveHeures");
  });

   //contract routes

  Route::group(['prefix' => 'contracts'], function () {
  
    Route::delete("delete_contract/{id}", "ContractsController@deleteContract");;//done
    Route::get("get", "ContractsController@getAll");//done
    Route::get('get_contracts/{id}', 'ContractsController@getContracts');
    Route::post('save_contracts/{id}', "ContractsController@updateContracts");
    Route::post('save_contracts', "ContractsController@saveContract");//done
  });

   //Bilan Routes

  Route::group(['prefix' => 'bilans'], function () {
  
    Route::delete("delete_bilan/{id}", "BilanModuleController@deleteBilan");;//done
    Route::get("get", "BilanModuleController@getAll");//done
    Route::get('get_bilan/{id}', 'BilanModuleController@getBilan');
    Route::post('save_bilan/{id}', "BilanModuleController@updateBilan");
    Route::post('save_bilan', "BilanModuleController@saveBilan");//done
  });

   //prix routes

  Route::group(['prefix' => 'prix'], function () {
  
    Route::delete("delete_prix/{id}", "PrixHeureController@deletePrix");;//done
    Route::get("get", "PrixHeureController@getAll");//done
    Route::get('get_prix/{id}', 'PrixHeureController@getPrix');
    Route::post('save_prix/{id}', "PrixHeureController@updatePrix");
    Route::post('save_prix', "PrixHeureController@savePrix");//done
  });


    // professor routes
  Route::group(['prefix' => 'professor'], function () {
  
    Route::get("get", "ProfessorController@all");//done
    Route::get('get_professor/{id}', 'ProfessorController@getProfessor');
  });
   
   //user routes
  Route::group(['prefix' => 'user'], function () {
  
   Route::get("get", "UserController@getAll");//done
  });

   //session routes
   
  Route::group(['prefix' => 'session'], function () {
  
    Route::delete("delete_session/{id}", "SessionController@deleteSession");;//done
    Route::get("get", "SessionController@allWithPeriods");//done
    Route::get('get_session/{id}', 'SessionController@getSession');
    Route::post('save_session/{id}', "SessionController@updateSession");
    Route::post('save_session', "SessionController@saveSession");//done
    //Route::get("get_session_periods", "SessionController@getSessionWithPeriods");//done
  });

  Route::group(['prefix' => 'period'], function () {
  
    Route::delete("delete_period/{id}", "PeriodController@deletePeriod");;//done
    Route::get("get", "PeriodController@getAllPeriods");//done
    Route::get('get_period/{id}', 'PeriodController@getPeriod');
    Route::post('save_period/{id}', "PeriodController@updatePeriod");
    Route::post('save_period', "PeriodController@savePeriod");//done
  });

  Route::group(['prefix' => 'weeks'], function () {
  
    Route::delete("delete_week/{id}", "WeekController@deleteWeek");;//done
    Route::get("get", "WeekController@getAllWeeks");//done
    Route::get('get_week/{id}', 'WeekController@getWeek');
    Route::post('save_week/{id}', "WeekController@updateWeek");
    Route::post('save_week', "WeekController@saveWeek");//done
  });