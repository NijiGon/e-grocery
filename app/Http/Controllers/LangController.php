<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    //
    public function setLang(){
        session(['lang' => request()->lang]);
        return redirect()->back();
    }
}
