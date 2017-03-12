<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->where('status', 1)->orderBy('created_at', 'desc')->limit(12)->get();
        return view('home')->with('users', $users);
    }

    public function tours()
    {
        $tours = DB::table('tours')->orderBy('is_hot', 'desc')->orderBy('created_at', 'desc')->limit(12)->get();
        return $tours;
    }
}
