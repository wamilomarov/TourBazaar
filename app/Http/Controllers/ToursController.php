<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ToursController extends Controller
{

    public function create(Request $request)
    {
//        $tour = new Tour($request->all());
//        $tour->save();
//       foreach ($request->cities as $city){
//           DB::table('tours_cities')->insert([
//               'tour_id' => $tour->id,
//               'city_id' => $city
//           ]);
//       }
//       foreach ($request->countries as $country){
//           DB::table('tours_countries')->insert([
//               'tour_id' => $tour->id,
//               'country_id' => $country
//           ]);
//       }
        if (isset($request->is_hot))
        return $request->all();
    }

    public function getCreateTourForm()
    {
//        $countries = DB::table('countries')->select('name', 'id')->get();
//        $cities = DB::table('cities')->select('name', 'id')->get();
        return view('admin.addTour')->with('user', Auth::user());
    }

    public function allTours()
    {
        $tours = DB::select('select 
                              tours.id as tour_id,
                              tours.title_az,
                              tours.title_en,
                              users.`name`,
                              GROUP_CONCAT( DISTINCT (SELECT `name` FROM countries WHERE countries.`id` = cnt.`country_id`) ) as countries,
                              GROUP_CONCAT( DISTINCT (SELECT  `name` FROM cities WHERE cities.`id` = ct.`id`)) as cities
                              
                            from tours 
                            
                            LEFT JOIN users ON users.id = tours.user_id
                            LEFT JOIN tours_countries cnt ON cnt.`tour_id` = tours.id
                            LEFT JOIN tours_cities ct ON ct.`tour_id` = tours.id
                            
                            GROUP BY tours.id
                            
                            ');
        return $tours;
    }

    public function search(Request $request)
    {
        $order = " ORDER BY is_hot DESC";

        $query = "select 
                              tours.id as tour_id,
                              tours.title_az,
                              tours.title_en,
                              tours.price,
                              users.`name`,
                              GROUP_CONCAT( DISTINCT (SELECT `name` FROM countries WHERE countries.`id` = cnt.`country_id`) ) as countries_list,
                              GROUP_CONCAT( DISTINCT (SELECT  `name` FROM cities WHERE cities.`id` = ct.`id`)) as cities_list,
                              (SELECT COUNT(id) FROM tours_countries cnt WHERE cnt.`tour_id` = tours.id) as countries_number,
                              (SELECT COUNT(id) FROM tours_cities ct WHERE ct.`tour_id` = tours.id) as cities_number
                              
                            from tours 
                            
                            LEFT JOIN users ON users.id = tours.user_id
                            LEFT JOIN tours_countries cnt ON cnt.`tour_id` = tours.id
                            LEFT JOIN tours_cities ct ON ct.`tour_id` = tours.id
                            
                            WHERE 1                            
                            ";

         if (isset($request->price_from)){
             $query .= " AND tours.`price` >= $request->price_from";
         }

         if (isset($request->price_to)){
             $query .= " AND tours.`price` <= $request->price_to";
         }

         if (isset($request->date_from)){
             $query .= " AND tours.`expire_date` > $request->date_from";
         }

         if (isset($request->date_to)){
             $query .= " AND tours.`expire_date` < $request->date_to";
         }

         $query .= " GROUP BY tours.id HAVING 1 ";

        if (isset($request->city)){
            $query .= " AND cities_list LIKE '%$request->city%'";
            $order .= ", cities_number ASC";
        }

        if (isset($request->country)){
            $query .= " AND countries_list LIKE '%$request->country%'";
            $order .= ", countries_number ASC";
        }

        $query .= $order;

        //return $query;
        $result = DB::select($query);

        return $result;
        
    }

    public function getCountriesList(Request $request)
    {
        $result = "";
        $input = $request->input;

        $list = DB::select("SELECT name FROM countries WHERE name LIKE '%$input%'");

        foreach ($list as $item) {
            $result .= "<option value = '$item->name'></option>";
        }
        echo $result;
    }

    public function getCitiesList(Request $request)
    {
        $result = "";
        $input = $request->country;

        $list = DB::select("SELECT name FROM cities WHERE country_id = (SELECT id FROM countries WHERE name = '$input')");

        foreach ($list as $item) {
            $result .= "<option value = '$item->name'></option>";
        }
        echo $result;
    }


}
