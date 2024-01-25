<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function update($id){
        $user = User::find($id);
        $genders = Gender::all();
        $roles = Role::all();
        return view('profile', compact('user', 'genders', 'roles'));
    }
    public function change(){
        request()->validate([
            'first' => 'required|string|max:25',
            'last' => 'required|string|max:25',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'file' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $user = User::find(request()->id);
        $imgfile = request()->file('file');
        if($imgfile){
            $imgname = Str::uuid()->toString() . '.' . $imgfile->getClientOriginalExtension();
            $imgpath = $imgfile->storeAs('public/images', $imgname);
        }
        $user->update([
            'first_name' => request()->first,
            'last_name' => request()->last,
            'email' => request()->email,
            'gender_id' => request()->gender,
            'password' => bcrypt(request()->password),
            'display_picture' => $imgfile ? $imgpath : $user->display_picture,
        ]);
        return redirect()->back();
    }
}
