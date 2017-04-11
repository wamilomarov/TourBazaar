<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    //

    public function index()
    {
        $agencies = DB::table('users')->where('status', '!=', 0)->get();
        return $agencies;
    }

    public function getAgencies()
    {
        $agencies = DB::select("SELECT 
                                users.id,
                                users.name,
                                users.email,
                                users.mobile_phone,
                                users.work_phone,
                                users.cover_image,
                                (SELECT COUNT(tours.id) FROM tours WHERE tours.user_id = users.id AND tours.status = 1) AS tours_count,
                                (SELECT COUNT(requests.id) FROM requests WHERE requests.user_id = users.id AND requests.status = 1) AS requests_count
                                FROM users
                                WHERE users.status = 1");
        return view('admin.agencies', compact('agencies'));
    }

    public function getRegisterForm()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');

            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();


            Image::make($image)->resize(800, 600)->save(public_path('/uploads/cover_images/' . $fileName));


            $user = new User($request->all());
        if (!$user->exists()){
            $user->password = bcrypt($request->password);
            $user->cover_image = $fileName;
            $user->save();
            return back();
        }
        else{
            return "User exists";
        }
        }
        else{
            return "No image";
        }
    }

    public function getUpdateForm(Request $request)
    {
        $user = User::find($request->id);
        return view('update')->with('user', $user);
    }

    public function update(Request $request)
    {
        if ($request->hasFile('cover_image')){
            $image = $request->file('cover_image');

            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(300, 300)->save(public_path('/uploads/cover_images/'. $fileName));

            $user = User::find($request->id);
            $user->cover_image = $fileName;

            $user->save();
        }

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->status = 0;
        $user->save();
        return redirect()->back();
    }

    public function getRequests()
    {

        $this->setLocaleAndCurrency('en', 'usd');

        if (Auth::user()->status == 1){
            $requests = DB::select("SELECT requests.id,
                                           requests.status,
                                           requests.client_full_name,
                                           requests.client_email,
                                           requests.client_phone,
                                           requests.number_of_places,
                                           requests.created_at AS `date`,
                                           tours.title_" . Session::get('db_locale') . " AS tour_name
                                    FROM requests
                                    LEFT JOIN tours ON tours.id = requests.tour_id
                                    WHERE requests.user_id = ".Auth::user()->id." AND requests.status = 1 
                                    ORDER BY requests.created_at DESC
                                    LIMIT 150");
            foreach ($requests as $req) {
                DB::update("UPDATE requests SET user_seen = 1 WHERE id = $req->id");
            }
           // DB::table('requests')->where('user_id', Auth::user()->id)->where('user_seen', 0)->update(['user_seen' => 1]);
        }
        elseif (Auth::user()->status == 5){
            $requests = DB::select("SELECT requests.id,
                                           requests.status,
                                           requests.client_full_name,
                                           requests.client_email,
                                           requests.client_phone,
                                           requests.number_of_places,
                                           requests.created_at AS `date`,
                                           requests.user_seen,
                                           tours.title_" . Session::get('db_locale') . " AS tour_name,
                                           users.name AS user_name 
                                    FROM requests
                                    LEFT JOIN tours ON tours.id = requests.tour_id 
                                    LEFT JOIN users ON users.id = requests.user_id
                                    WHERE requests.status = 1
                                    ORDER BY requests.created_at DESC
                                    LIMIT 150");

            foreach ($requests as $req) {
                DB::update("UPDATE requests SET admin_seen = 1 WHERE id = $req->id");
            }
            //DB::table('requests')->where('user_id', Auth::user()->id)->where('admin_seen', 0)->update(['admin_seen' => 1]);
        }

        return view('admin.requests')->with('requests', $requests);

    }

    public function setLocaleAndCurrency($locale, $currency)
    {
        if (!Session::has('locale')){
            Session::put('locale', $locale);

            if ($locale == 'ar'){
                Session::put('db_locale', 'en');
            }
            else{
                Session::put('db_locale', $locale);
            }
        }

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

    public function changeCurrencyRate(Request $request)
    {
        $user = Auth::user();
        $user->UsdToAzn = $request->UsdToAzn;
        $user->save();
        return redirect()->back();
    }



}
