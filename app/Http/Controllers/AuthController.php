<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function showRegister(){
        $genders = Gender::all();
        $role = Role::where('name', '=', 'User')->first();
        return view('auth.register', compact('genders', 'role'));
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('success');
        }
        return redirect()->back()->withErrors('Login Error');

    }

    public function register(Request $request){
        $request->validate([
            'first' => 'required|string|max:25',
            'last' => 'required|string|max:25',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'file' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $imgfile = request()->file('file');
        $imgname = Str::uuid()->toString() . '.' . $imgfile->getClientOriginalExtension();
        $imgpath = $imgfile->storeAs('public/images', $imgname);
        $user = User::create([
            'first_name' => $request->first,
            'last_name' => $request->last,
            'email' => $request->email,
            'role_id' => $request->role,
            'gender_id' => $request->gender,
            'password' => bcrypt($request->password),
            'display_picture' => $imgname,
        ]);
        auth()->login($user);
        return redirect()->route('success');
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('success');
    }
}
