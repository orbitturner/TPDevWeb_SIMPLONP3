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


Route::resource('agencies', 'agencyAPIController');

Route::resource('clientphysiques', 'ClientphysiqueAPIController');

Route::resource('states', 'StateAPIController');

Route::resource('profiles', 'ProfileAPIController');

Route::resource('openingfees', 'OpeningfeeAPIController');

Route::resource('employees', 'EmployeeAPIController');

Route::resource('compteepsxes', 'CompteepsxAPIController');