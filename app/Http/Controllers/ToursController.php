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
        //$tour->save();
        return $request->cities;
    }

    public function getCreateTourForm()
    {
        $countries = DB::table('countries')->select('name', 'cc_flips as code')->get();
        return view('addTour')->with('countries', $countries);
    }

    public function allTours()
    {
        $tours = DB::select('select 
                              *,
                              users.name,
                              
                            from tours 
                            
                            LEFT JOIN users ON users.id = tours.user_id
                            where status <> 0
                            ');
        return $tours;
    }


}
