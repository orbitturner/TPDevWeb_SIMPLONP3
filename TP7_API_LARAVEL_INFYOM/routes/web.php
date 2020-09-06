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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');


Route::resource('agencies', 'agencyController');

Route::resource('agencyStates', 'AgencyStateController');

Route::resource('clientphysiques', 'ClientphysiqueController');

Route::resource('compteepsxes', 'CompteepsxController');

Route::resource('compteepsxEtats', 'CompteepsxEtatController');

Route::resource('employees', 'EmployeeController');

Route::resource('openingfees', 'OpeningfeeController');

Route::resource('profiles', 'ProfileController');

Route::resource('profileStates', 'ProfileStateController');

Route::resource('states', 'StateController');

Route::resource('userStates', 'UserStateController');