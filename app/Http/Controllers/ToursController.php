<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class ToursController extends Controller
{

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photos.*' => 'image|mimes:jpg,png',
            'expire_date' => 'date|date_format:Y-m-d|after:today'
        ]);

        if ($validator->fails()) {
            return redirect('addTour')
                ->withErrors($validator);
        }
        if ($request->hasFile('photos')){
            $images = $request->allFiles();
            foreach ($images['photos'] as $photo) {
                if ($photo->getClientSize() > 2000000){
                    return redirect('addTour')->withErrors(['photos'=>['File size of one picture must be lower than 2MB.']]);
                }
            }

            $tour = new Tour($request->all());
            $tour->user_id = Auth::user()->id;

            $tour->save();

            foreach ($images['photos'] as $image) {
                $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(500, 500)->save(public_path('/uploads/cover_images/'. $fileName));

                DB::select("INSERT INTO tours_photos (tour_id, photo) VALUES (".$tour->id.", '$fileName')");
            }

            foreach ($request->countries as $country) {
                DB::select("INSERT INTO tours_countries (tour_id, country_id) VALUES (
                            $tour->id,
                            (SELECT id FROM countries WHERE name = '$country'))");
            }

            foreach ($request->cities as $city) {
                DB::select("INSERT INTO tours_cities (tour_id, city_id) VALUES (
                            $tour->id,
                            (SELECT id FROM cities WHERE name = '$city'))");
            }

        }

        return redirect('admin');
    }

    public function getCreateTourForm()
    {
        return view('admin.addTour');
    }

    public function getTours()
    {
        if (Auth::user()->status == 1){
            $tours = DB::select("SELECT 
        tours.id,
        tours.status,
        tours.title_en AS title,
        tours.price,
        tours.currency,
        tours.is_hot,
        tours.expire_date
        FROM tours
        WHERE tours.status =1 AND tours.user_id = ".Auth::user()->id);
        }
        elseif (Auth::user()->status == 5){
            $tours = DB::select("SELECT 
        tours.id,
        tours.status,
        tours.title_en AS title,
        tours.price,
        tours.currency,
        tours.is_hot,
        tours.expire_date,
        users.name AS agency
        FROM tours
        LEFT JOIN users ON users.id = tours.user_id
        WHERE tours.status = 1");
        }

        return view('admin.tours')->with('tours', $tours);
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

        $list = DB::select("SELECT id, name FROM countries WHERE name LIKE '%$input%'");

        foreach ($list as $item) {
            $result .= "<option value = '$item->name'></option>";
        }
        echo $result;
    }

    public function getCitiesList(Request $request)
    {
        $result = "";
        $input = $request->country;

        $list = DB::select("SELECT id, name FROM cities WHERE country_id = (SELECT id FROM countries WHERE name = '$input')");

        foreach ($list as $item) {
            $result .= "<option value = '$item->name'></option>";
        }
        echo $result;
    }

    public function dashboard()
    {
        if (Auth::user()->status == 5){
            $tours['tours'] = DB::select("SELECT 
        tours.id,
        tours.status,
        tours.title_en AS title,
        tours.price,
        tours.is_hot,
        tours.expire_date,
        users.name AS agency
        FROM tours
        LEFT JOIN users ON users.id = tours.user_id
        WHERE tours.status = 0");
            $tours['count'] = DB::select("SELECT COUNT(id) as `count` FROM tours WHERE status = 1");
        }
        elseif (Auth::user()->status == 1){
            $tours['tours'] = DB::select("SELECT 
        tours.id,
        tours.status,
        tours.title_en AS title,
        tours.price,
        tours.is_hot,
        tours.expire_date
        FROM tours
        WHERE tours.status = 0 AND tours.user_id = ".Auth::user()->id);
            $tours['count'] = DB::select("SELECT COUNT(id) as `count` FROM tours WHERE status = 1 AND user_id = ".Auth::user()->id);
        }


        $user = \Illuminate\Support\Facades\Auth::user();

        return view('admin.dashboard', compact('user', 'tours'));
    }

    public function accept(Request $request)
    {
        $tour_id = $request->tour_id;
        DB::update("UPDATE tours SET status = 1 WHERE id = $tour_id");
        return back();
    }

    public function decline(Request $request)
    {
        $tour_id = $request->tour_id;
        DB::update("UPDATE tours SET status = -1 WHERE id = $tour_id");
        return back();
    }

    public function remove(Request $request)
    {
        $tour_id = $request->tour_id;
        DB::update("UPDATE tours SET status = -1 WHERE id = $tour_id");
        return back();
    }

    public function allTours()
    {
        if (Auth::user()->status == 5)
        $tours = DB::select('select 
                              tours.id as id,
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
        foreach ($tours as $tour) {
            $tour->photos[] = DB::table('tours_photos')->select('photo')->where('tour_id', $tour->id)->get();
        }
        return $tours;
    }

}
