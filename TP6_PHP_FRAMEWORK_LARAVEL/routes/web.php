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

Route::group([
    'prefix' => 'clientphysiques',
], function () {
    Route::get('/', 'ClientphysiquesController@index')
         ->name('clientphysiques.clientphysique.index');
    Route::get('/create','ClientphysiquesController@create')
         ->name('clientphysiques.clientphysique.create');
    Route::get('/show/{clientphysique}','ClientphysiquesController@show')
         ->name('clientphysiques.clientphysique.show')->where('id', '[0-9]+');
    Route::get('/{clientphysique}/edit','ClientphysiquesController@edit')
         ->name('clientphysiques.clientphysique.edit')->where('id', '[0-9]+');
    Route::post('/', 'ClientphysiquesController@store')
         ->name('clientphysiques.clientphysique.store');
    Route::put('clientphysique/{clientphysique}', 'ClientphysiquesController@update')
         ->name('clientphysiques.clientphysique.update')->where('id', '[0-9]+');
    Route::delete('/clientphysique/{clientphysique}','ClientphysiquesController@destroy')
         ->name('clientphysiques.clientphysique.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'compteepsxes',
], function () {
    Route::get('/', 'CompteepsxesController@index')
         ->name('compteepsxes.compteepsx.index');
    Route::get('/create','CompteepsxesController@create')
         ->name('compteepsxes.compteepsx.create');
    Route::get('/show/{compteepsx}','CompteepsxesController@show')
         ->name('compteepsxes.compteepsx.show')->where('id', '[0-9]+');
    Route::get('/{compteepsx}/edit','CompteepsxesController@edit')
         ->name('compteepsxes.compteepsx.edit')->where('id', '[0-9]+');
    Route::post('/', 'CompteepsxesController@store')
         ->name('compteepsxes.compteepsx.store');
    Route::put('compteepsx/{compteepsx}', 'CompteepsxesController@update')
         ->name('compteepsxes.compteepsx.update')->where('id', '[0-9]+');
    Route::delete('/compteepsx/{compteepsx}','CompteepsxesController@destroy')
         ->name('compteepsxes.compteepsx.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'agencies',
], function () {
    Route::get('/', 'AgenciesController@index')
         ->name('agencies.agency.index');
    Route::get('/create','AgenciesController@create')
         ->name('agencies.agency.create');
    Route::get('/show/{agency}','AgenciesController@show')
         ->name('agencies.agency.show')->where('id', '[0-9]+');
    Route::get('/{agency}/edit','AgenciesController@edit')
         ->name('agencies.agency.edit')->where('id', '[0-9]+');
    Route::post('/', 'AgenciesController@store')
         ->name('agencies.agency.store');
    Route::put('agency/{agency}', 'AgenciesController@update')
         ->name('agencies.agency.update')->where('id', '[0-9]+');
    Route::delete('/agency/{agency}','AgenciesController@destroy')
         ->name('agencies.agency.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'agency_states',
], function () {
    Route::get('/', 'AgencyStatesController@index')
         ->name('agency_states.agency_state.index');
    Route::get('/create','AgencyStatesController@create')
         ->name('agency_states.agency_state.create');
    Route::get('/show/{agencyState}','AgencyStatesController@show')
         ->name('agency_states.agency_state.show')->where('id', '[0-9]+');
    Route::get('/{agencyState}/edit','AgencyStatesController@edit')
         ->name('agency_states.agency_state.edit')->where('id', '[0-9]+');
    Route::post('/', 'AgencyStatesController@store')
         ->name('agency_states.agency_state.store');
    Route::put('agency_state/{agencyState}', 'AgencyStatesController@update')
         ->name('agency_states.agency_state.update')->where('id', '[0-9]+');
    Route::delete('/agency_state/{agencyState}','AgencyStatesController@destroy')
         ->name('agency_states.agency_state.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'compteepsx_etats',
], function () {
    Route::get('/', 'CompteepsxEtatsController@index')
         ->name('compteepsx_etats.compteepsx_etat.index');
    Route::get('/create','CompteepsxEtatsController@create')
         ->name('compteepsx_etats.compteepsx_etat.create');
    Route::get('/show/{compteepsxEtat}','CompteepsxEtatsController@show')
         ->name('compteepsx_etats.compteepsx_etat.show')->where('id', '[0-9]+');
    Route::get('/{compteepsxEtat}/edit','CompteepsxEtatsController@edit')
         ->name('compteepsx_etats.compteepsx_etat.edit')->where('id', '[0-9]+');
    Route::post('/', 'CompteepsxEtatsController@store')
         ->name('compteepsx_etats.compteepsx_etat.store');
    Route::put('compteepsx_etat/{compteepsxEtat}', 'CompteepsxEtatsController@update')
         ->name('compteepsx_etats.compteepsx_etat.update')->where('id', '[0-9]+');
    Route::delete('/compteepsx_etat/{compteepsxEtat}','CompteepsxEtatsController@destroy')
         ->name('compteepsx_etats.compteepsx_etat.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'employees',
], function () {
    Route::get('/', 'EmployeesController@index')
         ->name('employees.employee.index');
    Route::get('/create','EmployeesController@create')
         ->name('employees.employee.create');
    Route::get('/show/{employee}','EmployeesController@show')
         ->name('employees.employee.show')->where('id', '[0-9]+');
    Route::get('/{employee}/edit','EmployeesController@edit')
         ->name('employees.employee.edit')->where('id', '[0-9]+');
    Route::post('/', 'EmployeesController@store')
         ->name('employees.employee.store');
    Route::put('employee/{employee}', 'EmployeesController@update')
         ->name('employees.employee.update')->where('id', '[0-9]+');
    Route::delete('/employee/{employee}','EmployeesController@destroy')
         ->name('employees.employee.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'openingfees',
], function () {
    Route::get('/', 'OpeningfeesController@index')
         ->name('openingfees.openingfee.index');
    Route::get('/create','OpeningfeesController@create')
         ->name('openingfees.openingfee.create');
    Route::get('/show/{openingfee}','OpeningfeesController@show')
         ->name('openingfees.openingfee.show')->where('id', '[0-9]+');
    Route::get('/{openingfee}/edit','OpeningfeesController@edit')
         ->name('openingfees.openingfee.edit')->where('id', '[0-9]+');
    Route::post('/', 'OpeningfeesController@store')
         ->name('openingfees.openingfee.store');
    Route::put('openingfee/{openingfee}', 'OpeningfeesController@update')
         ->name('openingfees.openingfee.update')->where('id', '[0-9]+');
    Route::delete('/openingfee/{openingfee}','OpeningfeesController@destroy')
         ->name('openingfees.openingfee.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'profiles',
], function () {
    Route::get('/', 'ProfilesController@index')
         ->name('profiles.profile.index');
    Route::get('/create','ProfilesController@create')
         ->name('profiles.profile.create');
    Route::get('/show/{profile}','ProfilesController@show')
         ->name('profiles.profile.show')->where('id', '[0-9]+');
    Route::get('/{profile}/edit','ProfilesController@edit')
         ->name('profiles.profile.edit')->where('id', '[0-9]+');
    Route::post('/', 'ProfilesController@store')
         ->name('profiles.profile.store');
    Route::put('profile/{profile}', 'ProfilesController@update')
         ->name('profiles.profile.update')->where('id', '[0-9]+');
    Route::delete('/profile/{profile}','ProfilesController@destroy')
         ->name('profiles.profile.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'profile_states',
], function () {
    Route::get('/', 'ProfileStatesController@index')
         ->name('profile_states.profile_state.index');
    Route::get('/create','ProfileStatesController@create')
         ->name('profile_states.profile_state.create');
    Route::get('/show/{profileState}','ProfileStatesController@show')
         ->name('profile_states.profile_state.show')->where('id', '[0-9]+');
    Route::get('/{profileState}/edit','ProfileStatesController@edit')
         ->name('profile_states.profile_state.edit')->where('id', '[0-9]+');
    Route::post('/', 'ProfileStatesController@store')
         ->name('profile_states.profile_state.store');
    Route::put('profile_state/{profileState}', 'ProfileStatesController@update')
         ->name('profile_states.profile_state.update')->where('id', '[0-9]+');
    Route::delete('/profile_state/{profileState}','ProfileStatesController@destroy')
         ->name('profile_states.profile_state.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'states',
], function () {
    Route::get('/', 'StatesController@index')
         ->name('states.state.index');
    Route::get('/create','StatesController@create')
         ->name('states.state.create');
    Route::get('/show/{state}','StatesController@show')
         ->name('states.state.show')->where('id', '[0-9]+');
    Route::get('/{state}/edit','StatesController@edit')
         ->name('states.state.edit')->where('id', '[0-9]+');
    Route::post('/', 'StatesController@store')
         ->name('states.state.store');
    Route::put('state/{state}', 'StatesController@update')
         ->name('states.state.update')->where('id', '[0-9]+');
    Route::delete('/state/{state}','StatesController@destroy')
         ->name('states.state.destroy')->where('id', '[0-9]+');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
