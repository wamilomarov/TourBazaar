<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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
        $user = new User($request->all());
        if (!$user->exists()){
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json($user);
        }
        else{
            return false;
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
}
