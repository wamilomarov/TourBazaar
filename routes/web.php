<?php

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

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('searchTour', 'ToursController@search');

Route::get('setLocale/{lang}', function($lang){
    App::setLocale($lang);
    return redirect('tours');
})->name('setLocale');

Route::get('tours', 'HomeController@tours');

Route::post('searchTours', 'ToursController@search');

Route::get('admin', function (){
    $user = new \App\User();
   return view('admin.dashboard')->with('user', $user);
});

Route::get('getCountriesList/{input}', 'ToursController@getCountriesList');

Route::get('getCitiesList/{country}', 'ToursController@getCitiesList');


//------------------------------------------FOR ADMIN-----------------------------------
Route::group(['middleware' => ['auth', 'admin', 'web']], function(){

    //Route::post('deleteTour', 'ToursController@delete');

    Route::post('verifyTour', 'UsersController@verifyTour');

    Route::get('addAgency', 'UsersController@getRegisterForm');

    Route::post('addAgency', 'UsersController@create')->name('addAgency');

    Route::get('getAgencies', 'UsersController@index');

    Route::get('updateAgency/{id}', 'UsersController@getUpdateForm')->name('update');

    Route::post('updateAgency', 'UsersController@update')->name('updateAgency');

    Route::get('deleteAgency/{id}', 'UsersController@delete')->name('deleteAgency');

});

//------------------------------------------FOR USER------------------------------------
Route::group(['middleware' => ['auth', 'web']], function (){

    Route::get('admin', function (){
        $user = new \App\User();
        return view('admin.dashboard')->with('user', $user);
    });

    Route::get('addTour', 'ToursController@getCreateTourForm');

    Route::post('addTour', 'ToursController@create');

    Route::get('getTours', 'ToursController@allTours');

    Route::post('updateTour', 'ToursController@update');

    Route::post('deleteTour', 'ToursController@delete');



});