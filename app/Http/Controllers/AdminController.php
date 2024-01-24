<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function update($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('update', compact('user', 'roles'));
    }
    public function change($id, Request $request){
        $user = User::find($id);
        $user->update([
            'role_id' => $request->role,
        ]);
        return redirect()->route('maintenance');
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
