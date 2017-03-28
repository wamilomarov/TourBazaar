<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    //

    public function index()
    {
        $agencies = DB::table('users')->where('status', '!=', 0)->get();
        return $agencies;
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

            Image::make($image)->resize(300, 300)->save(public_path('/uploads/cover_images/' . $fileName));


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
        return $user;
    }

    public function getRequests()
    {
        if (Auth::user()->status == 1){
            $requests = DB::select("SELECT requests.id,
                                           requests.status,
                                           requests.client_full_name,
                                           requests.client_email,
                                           requests.client_phone,
                                           requests.created_at AS `date`,
                                           tours.title_en AS tour_name
                                    FROM requests
                                    LEFT JOIN tours ON tours.id = requests.tour_id
                                    WHERE requests.user_id = ".Auth::user()->id." AND requests.status = 1 
                                    ORDER BY requests.created_at DESC
                                    LIMIT 150");
            DB::table('requests')->where('user_id', Auth::user()->id)->where('user_seen', 0)->update(['user_seen' => 1]);
        }
        elseif (Auth::user()->status == 5){
            $requests = DB::select("SELECT requests.id,
                                           requests.status,
                                           requests.client_full_name,
                                           requests.client_email,
                                           requests.client_phone,
                                           requests.created_at AS `date`,
                                           tours.title_en AS tour_name,
                                           users.name AS user_name 
                                    FROM requests
                                    LEFT JOIN tours ON tours.id = requests.tour_id 
                                    LEFT JOIN users ON users.id = requests.user_id
                                    WHERE requests.status = 1
                                    ORDER BY requests.created_at DESC
                                    LIMIT 150");
            DB::table('requests')->where('user_id', Auth::user()->id)->where('admin_seen', 0)->update(['admin_seen' => 1]);
        }

        return view('admin.requests')->with('requests', $requests);

    }


}
