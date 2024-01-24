<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

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
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        // dd($request->role);
        $user = User::create([
            'first_name' => $request->first,
            'last_name' => $request->last,
            'email' => $request->email,
            'role_id' => $request->role,
            'gender_id' => $request->gender,
            'password' => bcrypt($request->password),
            'display_picture' => $request->file('file')->getClientOriginalName(),
        ]);
        auth()->login($user);
        return redirect()->route('success');
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('success');
    }
}
