<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
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

                echo $fileName." ";

                Image::make($image)->fit(800, 600, function ($constraint) {
                    $constraint->upsize();
                })->save(public_path('/uploads/tour_images/'. $fileName));

                DB::select("INSERT INTO tours_photos (tour_id, photo) VALUES (".$tour->id.", '$fileName')");
            }

            foreach ($request->countries as $country) {
                DB::select("INSERT INTO tours_countries (tour_id, country_id) VALUES (
                            $tour->id,
                            (SELECT id FROM countries WHERE name = '$country' LIMIT 1))");
            }

            foreach ($request->cities as $city) {
                DB::select("INSERT INTO tours_cities (tour_id, city_id) VALUES (
                            $tour->id,
                            (SELECT id FROM cities WHERE name = '$city' LIMIT 1))");
            }

        }

//        return redirect('addTour');
    }


    public function getCreateTourForm()
    {
        return view('admin.addTour');
    }

    public function getTours()
    {
        $this->setLocaleAndCurrency('en', 'usd');

        if (Auth::user()->status == 1){
            $tours = DB::select("SELECT 
        tours.id,
        tours.status,
        tours.title_" . Session::get('db_locale') . " AS title,
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
        tours.title_". Session::get('db_locale') ." AS title,
        tours.price,
        tours.currency,
        tours.is_hot,
        tours.expire_date,
        users.name AS agency
        FROM tours
        LEFT JOIN users ON users.id = tours.user_id
        WHERE tours.status = 1");
        }
        foreach ($tours as $tour) {
            $this->getPrice($tour);
        }

        if (!Session::has('tourType')){
            Session::put('tourType', 'all');
        }

        return view('admin.tours')->with('tours', $tours);
    }

    public function search(Request $request)
    {
        if (!Session::has('tourType')){
            return redirect('/');
        }

        $this->setLocaleAndCurrency('en', 'usd');

//        $test = DB::table('tours')->select(DB::raw("tours.id,
//                              tours.title_az,
//                              tours.title_". Session::get('db_locale') ." AS title,
//                              tours.price,
//                              tours.currency,
//                              tours.expire_date,
//                              tours.is_hot,
//                              tours.created_at,
//                              COUNT(tours.id) AS tours_count,
//                              users.`name`,
//                              GROUP_CONCAT( DISTINCT (SELECT `name` FROM countries WHERE countries.`id` = cnt.`country_id`) ) AS countries_list,
//                              GROUP_CONCAT( DISTINCT (SELECT  `name` FROM cities WHERE cities.`id` = ct.`id`)) AS cities_list,
//                              (SELECT COUNT(id) FROM tours_countries cnt WHERE cnt.`tour_id` = tours.id) AS countries_number,
//                              (SELECT COUNT(id) FROM tours_cities ct WHERE ct.`tour_id` = tours.id) AS cities_number"))->
//        leftJoin('users', 'users.id', '=', 'tours.user_id')->
//        leftJoin('tours_countries as cnt', 'cnt.tour_id', '=', 'tours.id')->
//        leftJoin('tours_cities as ct', 'ct.tour_id', '=', 'tours.id');


        //$test->orderBy('is_hot', 'desc');

//        $test = $test->where('tours.status', 1);

        $order = " ORDER BY tours.is_hot DESC";
        if (isset($request->order) && !empty($request->order)){

            switch ($request->order){
                case 1: $order .= "tours.price asc"; break;
                case 2: $order .= "tours.price desc"; break;
                case 3: $order .= "tours.created_at desc"; break;
                default: $order .= "";
            }

//             $test = $test->where('tours.price', '>=', $request->price_from);
        }

        $query = "select
                              tours.id,
                              tours.title_az,
                              tours.title_". Session::get('db_locale') ." AS title,
                              tours.price,
                              tours.currency,
                              tours.expire_date,
                              tours.is_hot,
                              users.`name`,
                              GROUP_CONCAT( DISTINCT (SELECT `name` FROM countries WHERE countries.`id` = cnt.`country_id`) ) as countries_list,
                              GROUP_CONCAT( DISTINCT (SELECT  `name` FROM cities WHERE cities.`id` = ct.`id`)) as cities_list,
                              (SELECT COUNT(id) FROM tours_countries cnt WHERE cnt.`tour_id` = tours.id) as countries_number,
                              (SELECT COUNT(id) FROM tours_cities ct WHERE ct.`tour_id` = tours.id) as cities_number

                            from tours

                            LEFT JOIN users ON users.id = tours.user_id
                            LEFT JOIN tours_countries cnt ON cnt.`tour_id` = tours.id
                            LEFT JOIN tours_cities ct ON ct.`tour_id` = tours.id

                            WHERE tours.status = 1
                            ";

         if (isset($request->price_from) && !empty($request->price_from)){
             $query .= " AND tours.`price` >= $request->price_from";
//             $test = $test->where('tours.price', '>=', $request->price_from);
         }

         if (isset($request->price_to) && !empty($request->price_to)){
             $query .= " AND tours.`price` <= $request->price_to";
//             $test = $test->where('tours.price', '<=', $request->price_to);
         }

         if (isset($request->date_from) && !empty($request->date_from)){
             $query .= " AND tours.`expire_date` > $request->date_from";
//             $test = $test->where('tours.expire_date', '>', $request->date_from);
         }

         if (isset($request->date_to) && !empty($request->date_to)){
             $query .= " AND tours.`expire_date` < $request->date_to";
//             $test = $test->where('tours.expire_date', '<', $request->date_to);
         }

        if (isset($request->page) && !empty($request->page)){
             $page = $request->page;
            $limit = " LIMIT 2 OFFSET $page";
        }
        else{
            $page = 1;
            $limit = " LIMIT 2";
        }

//        $test = $test->groupBy('tours.id');

         $query .= " GROUP BY tours.id HAVING 1 ";

        if (isset($request->city) && !empty($request->city)){
            $query .= " AND cities_list LIKE '%$request->city%'";
//            $test = $test->havingRaw("GROUP_CONCAT( DISTINCT (SELECT  `name` FROM cities WHERE cities.`id` = ct.`id`)) LIKE '%$request->city%'");
            $order .= ", cities_number ASC";
//            $test = $test->orderBy('(SELECT COUNT(id) FROM tours_cities ct WHERE ct.`tour_id` = tours.id)', 'ASC');
        }

        if (isset($request->country) && !empty($request->country)){
            $query .= " AND countries_list LIKE '%$request->country%'";
//            $test = $test->havingRaw("GROUP_CONCAT( DISTINCT (SELECT  `name` FROM cities WHERE cities.`id` = ct.`id`)) LIKE '%$request->country%'");
            $order .= ", countries_number ASC";
//            $test = $test->orderBy('(SELECT COUNT(id) FROM tours_countries cnt WHERE cnt.`tour_id` = tours.id)', 'ASC');
        }

        if (Session::get('tourType') == 'local'){
            $query .= " AND countries_number = 1 AND countries_list LIKE '%Azerbaijan%' ";
//            $test = $test->having(DB::raw("(SELECT COUNT(id) FROM tours_countries cnt WHERE cnt.`tour_id` = tours.id)"), '=', 1)->having(DB::raw("GROUP_CONCAT( DISTINCT (SELECT  `name` FROM cities WHERE cities.`id` = ct.`id`))"), 'LIKE', '%Azerbaijan%');
       }

        elseif (Session::get('tourType') == 'world'){
            $query .= " AND countries_number <> 1 OR countries_list NOT LIKE '%Azerbaijan%'";
//            $test = $test->having(DB::raw('(SELECT COUNT(id) FROM tours_countries cnt WHERE cnt.`tour_id` = tours.id)'), '<>', 1)->having(DB::raw('GROUP_CONCAT( DISTINCT (SELECT  `name` FROM cities WHERE cities.`id` = ct.`id`))'),  'NOT LIKE',  '%Azerbaijan%');
        }

        $query .= $order . $limit;

        //return $query;
        $tours['tours'] = DB::select($query);

        $url = "searchTours?country=$request->country&city=$request->city&price_from=$request->price_from&price_to=$request->price_to&date_from=$request->date_from&date_to=$request->date_to";

        if (count($tours['tours']) == 2){
            $next_page = $page + 1;
            $tours['next'] = url("$url&page=$next_page");
        }
        else
            { $tours['next'] = "#";}

        if ($page > 1){
            $prev_page = $page - 1;
            $tours['prev'] = url("$url&page=$prev_page");
        }
        else
            { $tours['prev'] = "#";}

        $sort['one'] = "$url&order=1";
        $sort['two'] = "$url&order=2";
        $sort['three'] = "$url&order=3";
        $sort['four'] = "$url&order=4";

//        $tours = $test->simplePaginate(12);

        foreach ($tours['tours'] as $tour) {
//            $tour->photos = DB::table('tours_photos')->select('photo')->where('tour_id', $tour->id)->get();
            $tour->photos = DB::select("SELECT photo FROM tours_photos WHERE tour_id = $tour->id");
            $this->getPrice($tour);
        }

        //return $tours;

        $images = $images = DB::table('users')->where('status', 1)->select('cover_image')->get(15);

//       return $tours;
        return view('home')->with('tours', $tours)->with('images', $images)->with('sort', $sort);
        
    }


    public function searchTour(Request $request)
    {
        if (!Session::has('tourType')){
            return redirect('/');
        }
        DB::enableQueryLog();

        $this->setLocaleAndCurrency('en', 'usd');

        $order = " ORDER BY ";

        $query = "select
                              tours.id,
                              tours.title_az,
                              tours.title_". Session::get('db_locale') ." AS title,
                              IF(tours.currency = 'USD', CEIL(tours.price/(SELECT UsdToAzn FROM users WHERE status = 5 LIMIT 1)), tours.price) AS order_by_price,
                              tours.price,
                              tours.currency,
                              tours.expire_date,
                              tours.is_hot,
                              users.`name`,
                              GROUP_CONCAT( DISTINCT (SELECT `name` FROM countries WHERE countries.`id` = cnt.`country_id`) ) as countries_list,
                              GROUP_CONCAT( DISTINCT (SELECT  `name` FROM cities WHERE cities.`id` = ct.`id`)) as cities_list,
                              (SELECT COUNT(id) FROM tours_countries cnt WHERE cnt.`tour_id` = tours.id) as countries_number,
                              (SELECT COUNT(id) FROM tours_cities ct WHERE ct.`tour_id` = tours.id) as cities_number

                            from tours

                            LEFT JOIN users ON users.id = tours.user_id
                            LEFT JOIN tours_countries cnt ON cnt.`tour_id` = tours.id
                            LEFT JOIN tours_cities ct ON ct.`tour_id` = tours.id

                            WHERE tours.status = 1
                            ";

        $form = [];

        if (isset($request->price_from) && !empty($request->price_from)){
            $query .= " AND tours.`price` >= $request->price_from";
            $form['price_form'] = $request->price_from;
        }

        if (isset($request->price_to) && !empty($request->price_to)){
            $query .= " AND tours.`price` <= $request->price_to";
            $form['price_to'] = $request->price_to;
        }

        if (isset($request->date_from) && !empty($request->date_from)){
            $query .= " AND tours.`expire_date` > $request->date_from";
            $form['date_from'] = $request->date_from;
        }

        if (isset($request->date_to) && !empty($request->date_to)){
            $query .= " AND tours.`expire_date` < $request->date_to";
            $form['date_to'] = $request->date_to;
        }

        if (isset($request->page) && !empty($request->page)){
            $page = $request->page;
            if ($request->page == 1)
                $offset = 0;
            else
                $offset = $request->page;
            $limit = " LIMIT 2 OFFSET ".($offset);
        }
        else{
            $page = 1;
            $limit = " LIMIT 2";
        }

        $query .= " GROUP BY tours.id HAVING 1 ";

        if (isset($request->city) && !empty($request->city)){
            $query .= " AND cities_list LIKE '%$request->city%'";
            $order .= ", cities_number ASC";
            $form['city'] = $request->city;
        }

        if (isset($request->country) && !empty($request->country)){
            $query .= " AND countries_list LIKE '%$request->country%'";
            $order .= ", countries_number ASC";
            $form['country'] = $request->country;
        }

        if (isset($request->order) && !empty($request->order)){

            switch ($request->order){
                case 1: $order .= " order_by_price ASC"; break;
                case 2: $order .= " order_by_price DESC"; break;
                case 3: $order .= " tours.created_at DESC"; break;
                case 4: $order .= " tours.is_hot DESC"; break;
                default: $order .= " tours.is_hot DESC"; break;
            }

            $order .= ", 1 ";

            $form['order'] = $request->order;
        }
        else{
            $order .= " tours.is_hot DESC ";
            $form['order'] = 4;
        }


        if (Session::get('tourType') == 'local'){
            $query .= " AND countries_number = 1 AND countries_list LIKE '%Azerbaijan%' ";
        }
        elseif (Session::get('tourType') == 'world'){
            $query .= " AND countries_number <> 1 OR countries_list NOT LIKE '%Azerbaijan%'";
        }


        $query .= $order . $limit;

        $tours['tours'] = DB::select($query);

        $url = "searchTours?";
        foreach ($form as $key => $value) {
            $url .= $key."=".$value."&";
        }

        if (count($tours['tours']) == 2){
            $next_page = $page + 1;
            $tours['next'] = url($url."page=$next_page");
        }
        else
        { $tours['next'] = "#";}

        if ($page > 1){
            $prev_page = $page - 1;
            $tours['prev'] = url($url."&page=$prev_page");
        }
        else
        { $tours['prev'] = "#";}

        foreach ($tours['tours'] as $tour) {
            $tour->photos = DB::select("SELECT photo FROM tours_photos WHERE tour_id = $tour->id");
            $this->getPrice($tour);
        }

        //var_dump(DB::getQueryLog());
        return view('home')->with('tours', $tours)->with('form', $form);

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
        $this->setLocaleAndCurrency('en', 'usd');

        if (Auth::user()->status == 5){
            $tours['tours'] = DB::select("SELECT 
        tours.id,
        tours.status,
        tours.title_". Session::get('db_locale') ." AS title,
        tours.price,
        tours.currency,
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
        tours.title_". Session::get('db_locale') ." AS title,
        tours.price,
        tours.currency,
        tours.is_hot,
        tours.expire_date
        FROM tours
        WHERE tours.status = 0 AND tours.user_id = ".Auth::user()->id);
            $tours['count'] = DB::select("SELECT COUNT(id) as `count` FROM tours WHERE status = 1 AND user_id = ".Auth::user()->id);
        }

        foreach ($tours['tours'] as $tour) {
            $this->getPrice($tour);
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

    public function delete(Request $request)
    {
        $photos = DB::select("SELECT photo FROM tours_photos WHERE tour_id = $request->tour_id");
        foreach ($photos as $photo) {
            unlink(public_path('/uploads/tour_images/'. $photo->photo));
        }
        DB::delete("DELETE FROM tours WHERE id = $request->tour_id");
        DB::delete("DELETE FROM tours_photos WHERE tour_id = $request->tour_id");

    }

    public function allTours()
    {
        $this->setLocaleAndCurrency('en', 'usd');

        if (Auth::user()->status == 5)
        $tours = DB::select("select 
                              tours.id as id,
                              tours.title_az,
                              tours.title_". Session::get('db_locale') ." AS `title`,
                              users.`name`,
                              GROUP_CONCAT( DISTINCT (SELECT `name` FROM countries WHERE countries.`id` = cnt.`country_id`) ) as countries,
                              GROUP_CONCAT( DISTINCT (SELECT  `name` FROM cities WHERE cities.`id` = ct.`id`)) as cities
                              
                            from tours 
                            
                            LEFT JOIN users ON users.id = tours.user_id
                            LEFT JOIN tours_countries cnt ON cnt.`tour_id` = tours.id
                            LEFT JOIN tours_cities ct ON ct.`tour_id` = tours.id
                            
                            GROUP BY tours.id
                            
                            ");
        foreach ($tours as $tour) {
            $tour->photos = DB::table('tours_photos')->select('photo')->where('tour_id', $tour->id)->get();
            $this->getPrice($tour);
        }

        return $tours;
    }

    public function getTour(Request $request)
    {
        if (!Session::has('tourType')){
            return redirect('/');
        }

        $this->setLocaleAndCurrency('en', 'usd');

        $tour = DB::select("SELECT tours.id,
                            tours.title_" . Session::get('db_locale') . " AS title,
                            users.name AS user_name,
                            users.id AS user_id,
                            users.cover_image AS user_cover,
                            users.email AS user_email,
                            users.mobile_phone AS user_mobile_phone,
                            users.work_phone AS user_work_phone,
                            tours.expire_date,
                            tours.price,
                            tours.currency,
                            tours.is_hot,
                            tours.description_" . Session::get('db_locale') . " AS description
                            FROM tours
                            LEFT JOIN users ON users.id = tours.user_id
                            WHERE tours.id = $request->tour_id AND tours.status = 1");
        if (count($tour) > 0){
            $tour = $tour[0];
        }
        else{
            return redirect()->back();
        }

        $tour->photos = DB::table('tours_photos')->select('photo')->where('tour_id', $tour->id)->get();

        $tour->countries = DB::select("SELECT countries.name FROM tours_countries
                                       LEFT JOIN countries ON countries.id = tours_countries.country_id
                                       WHERE tours_countries.tour_id = $tour->id");

        $tour->cities = DB::select("SELECT cities.name FROM tours_cities
                                       LEFT JOIN cities ON cities.id = tours_cities.city_id
                                       WHERE tours_cities.tour_id = $tour->id");

        $tour->tours = DB::select("SELECT 
                            tours.id,
                            tours.title_" . Session::get('db_locale') . " AS title,
                            tours_photos.photo,
                            tours.expire_date
                            FROM tours
                            LEFT JOIN users ON users.id = tours.user_id
                            LEFT JOIN tours_photos ON tours_photos.tour_id = tours.id
                            WHERE tours.user_id = $tour->user_id AND tours.status = 1 AND tours.id <> $tour->id
                            ORDER BY tours.is_hot desc LIMIT 3");


        $this->getPrice($tour);

        return view('tourDetails')->with('tour', $tour);
    }

    public function setLocale(Request $request)
    {
        $validator = Validator::make($request->only(['lang']), [
            'lang' => 'in:en,az,ar'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }
        //App::setLocale($request->lang);
        Session::put('locale', $request->lang);

        if (Session::get('locale') == 'ar'){
            Session::put('db_locale', 'en');
        }
        else{
            Session::put('db_locale', $request->lang);
        }

        return redirect(URL::previous());
    }

    public function setCurrency(Request $request)
    {
        $validator = Validator::make($request->only(['currency']), [
            'currency' => 'in:usd,azn'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }
        Session::put('currency', $request->currency);
        return redirect()->back();
    }

    public function setLocaleAndCurrency($locale, $currency)
    {
        if (!Session::has('locale')){
            Session::put('locale', $locale);

            if (Session::get('locale') == 'ar'){
                Session::put('db_locale', 'en');
            }
            else{
                Session::put('db_locale', $locale);
            }
        }

        App::setLocale(Session::get('locale'));

        if (!Session::has('currency')){
            Session::put('currency', $currency);
        }

    }

    public function getPrice($tour)
    {
        if (Session::get('currency') != strtolower($tour->currency)){
            $rate = DB::table('users')->select('UsdToAzn')->where('status', 5)->first()->UsdToAzn;
            if ($tour->currency == 'AZN'){
                $tour->price = ceil($tour->price / $rate);
            }
            elseif($tour->currency == 'USD'){
                $tour->price = ceil($tour->price * $rate);
            }
            $tour->currency = strtoupper(Session::get('currency'));
        }
    }

    public function setToursType(Request $request)
    {
        $validator = Validator::make($request->only(['tourType']), [
            'tourType' => 'in:world,local,all'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }
        //App::setLocale($request->lang);
        Session::put('tourType', $request->tourType);
        return redirect('tours');
    }

    public function sendRequest(Request $request)
    {
        DB::table('requests')->insert([
            'tour_id' => $request->tour_id,
            'user_id' => $request->user_id,
            'client_full_name' => $request->client_full_name,
            'client_phone' => $request->client_phone,
            'number_of_places' => $request->number_of_places,
            'client_email' => $request->client_email
            ]);

        return redirect()->back();

    }

}
