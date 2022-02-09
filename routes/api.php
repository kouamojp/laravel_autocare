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

Route::apiResource('clients', 'ClientController');
Route::apiResource('techniciens', 'TechnicienController');
Route::apiResource('vehicules', 'VehiculeController');
Route::apiResource('interventions', 'InterventionController');
Route::apiResource('devis', 'DevisController');
Route::apiResource('factures', 'FactureController');

//
Route::post('techniciens/login', 'TechnicienController@login');
Route::get('interventions/{id}', 'InterventionController@list_intervs');

