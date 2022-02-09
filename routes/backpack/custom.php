<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('client', 'ClientCrudController');
    Route::crud('technicien', 'TechnicienCrudController');
    Route::crud('vehicule', 'VehiculeCrudController');
    Route::crud('intervention', 'InterventionCrudController');
    Route::crud('devis', 'DevisCrudController');
    Route::crud('facture', 'FactureCrudController');
    Route::crud('offre', 'OffreCrudController');
    
    Route::crud('action_intervention', 'Action_interventionCrudController');
});

//Route dependencies API
Route::get('api/action_intervention', 'App\Http\Controllers\Api\Action_interventionController@index');
Route::get('api/action_intervention/{id}', 'App\Http\Controllers\Api\Action_interventionController@show');


Route::get('api/offre', 'App\Http\Controllers\Api\OffreController@index');
Route::get('api/offre/{id}', 'App\Http\Controllers\Api\OffreController@show');