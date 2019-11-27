<?php

use Illuminate\Http\Request;

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





Route::post('/getConnexion', 'ControllerLogin@signIn')->middleware('cors');

Route::prefix('employes')->group(function(){
    Route::get('/getListeEmploye', 'ControllerEmploye@getListeEmploye')->middleware('cors');
    Route::get('/getListeEmployeFonction/{id}', 'ControllerEmploye@listeEmployeAttraction')->middleware('cors');
    Route::post('addEmploye', 'ControllerEmploye@ajoutEmploye');
});

Route::prefix('attraction')->group(function(){
    Route::get('/getLesAttractions', 'ControllerAttraction@listeAttraction')->middleware('cors');
    Route::post('updateAttraction', 'ControllerAttraction@modifierAttraction');
});

