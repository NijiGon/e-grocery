<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index(){
        $items = Item::all();
        return view('home', compact('items'));
    }
    public function show($id){
        $item = Item::find($id);
        return view('item', compact('item'));
    }
}
