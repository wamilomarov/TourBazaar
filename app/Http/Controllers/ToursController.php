<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToursController extends Controller
{

    public function create(Request $request)
    {
        $tour = new Tour($request->all());
        $tour->save();
       foreach ($request->cities as $city){
           DB::table('tours_cities')->insert([
               'tour_id' => $tour->id,
               'city_id' => $city
           ]);
       }
       foreach ($request->countries as $country){
           DB::table('tours_countries')->insert([
               'tour_id' => $tour->id,
               'country_id' => $country
           ]);
       }
    }

    public function getCreateTourForm()
    {
        $countries = DB::table('countries')->select('name', 'id')->get();
        $cities = DB::table('cities')->select('name', 'id')->get();
        return view('addTour')->with('countries', $countries)->with('cities', $cities);
    }

    public function allTours()
    {
        $tours = DB::select('select 
                              *,
                              users.name,
                              cnt.id,
                              ct.id
                              
                            from tours 
                            
                            LEFT JOIN users ON users.id = tours.user_id
                            LEFT JOIN tours_countries cnt ON cnt.`tour_id` = tours.id
                            LEFT JOIN tours_cities ct ON ct.`tour_id` = tours.id
                            
                            GROUP BY tours.id
                            
                            ');
        return $tours;
    }


}
