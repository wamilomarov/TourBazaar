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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $images = DB::table('users')->where('status', 1)->select('cover_image')->get(15);
    return view('startPage')->with('images', $images);
});

Auth::routes();

//Route::post('searchTour', 'ToursController@search');

Route::get('/setLocale', 'ToursController@setLocale');

Route::get('/setCurrency', 'ToursController@setCurrency');

Route::get('/setToursType', 'ToursController@setToursType');

//Route::get('tours', 'HomeController@tours');

Route::get('/searchTours', 'ToursController@searchTour');

//Route::get('admin', function (){
//    $user = new \App\User();
//   return view('admin.dashboard')->with('user', $user);
//});

Route::post('sendRequest', 'ToursController@sendRequest');

Route::get('getCountriesList/{input}', 'ToursController@getCountriesList');

Route::get('getCitiesList/{country}', 'ToursController@getCitiesList');

Route::get('/tours', 'ToursController@searchTour');

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

    Route::get('deleteTour/{tour_id}', 'ToursController@delete');

    Route::get('getRequests', 'UsersController@getRequests');

});