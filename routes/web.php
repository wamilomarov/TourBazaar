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
    return view('startPage');
});

Auth::routes();

Route::get('/home', 'ToursController@search');

Route::get('/worldTours', 'ToursController@worldTours');

Route::get('/localTours', 'ToursController@localTours');

Route::post('searchTour', 'ToursController@search');

Route::get('/setLocale', 'ToursController@setLocale');

Route::get('/setCurrency', 'ToursController@setCurrency');

Route::get('tours', 'HomeController@tours');

Route::post('searchTours', 'ToursController@search');

//Route::get('admin', function (){
//    $user = new \App\User();
//   return view('admin.dashboard')->with('user', $user);
//});

Route::post('sendRequest', 'ToursController@sendRequest');

Route::get('getCountriesList/{input}', 'ToursController@getCountriesList');

Route::get('getCitiesList/{country}', 'ToursController@getCitiesList');

Route::get('/tours', 'ToursController@search');

Route::get('/getTour/{tour_id}', 'ToursController@getTour');


//------------------------------------------FOR ADMIN-----------------------------------
Route::group(['middleware' => ['auth', 'admin', 'web']], function(){

    //Route::post('deleteTour', 'ToursController@delete');

    Route::post('verifyTour', 'UsersController@verifyTour');

    Route::get('addAgency', 'UsersController@getRegisterForm');

    Route::post('addAgency', 'UsersController@create')->name('addAgency');

    Route::get('getAgencies', 'UsersController@getAgencies');

    Route::post('changeCurrencyRate', 'UsersController@changeCurrencyRate');

    Route::get('deleteAgency/{id}', 'UsersController@delete')->name('deleteAgency');

    Route::get('acceptTour/{tour_id}', 'ToursController@accept');

    Route::get('declineTour/{tour_id}', 'ToursController@decline');

});

//------------------------------------------FOR USER------------------------------------
Route::group(['middleware' => ['auth', 'web']], function (){

    Route::get('admin', 'ToursController@dashboard');

    Route::get('addTour', 'ToursController@getCreateTourForm');

    Route::post('addTour', 'ToursController@create');

    Route::get('getTours', 'ToursController@getTours');

    Route::post('updateTour', 'ToursController@update');

    Route::post('deleteTour', 'ToursController@delete');

    Route::get('updateProfile', 'UsersController@getUpdateForm');

    Route::post('updateProfile', 'UsersController@update');

    Route::get('removeTour/{tour_id}', 'ToursController@remove');

    Route::get('getRequests', 'UsersController@getRequests');

});