<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index(){
        $cart = session('cart');
        $total = 0;
        if($cart !== null){
            foreach ($cart as $c) {
                $total += $c->price;
            }
        }
        $items = $cart;
        return view('cart', compact('items', 'total'));
    }
    public function add(){
        $cart = session()->has('cart') ? session('cart') : collect();
        $item = Item::find(request()->id);
        $cart->add($item);
        session(['cart' => $cart]);
        return redirect()->back();
    }

    public function delete(){
        $cart = session('cart');
        $first = $cart->firstWhere('id', request()->id);
        if($first){
            $cart->forget($cart->search($first));
        }
        session(['cart' => $cart]);
        return redirect()->intended('cart');
    }


    public function checkout(){
        $cart = session('cart');
        foreach($cart as $c){
            Order::create([
                'user_id' => auth()->user()->id,
                'item_id' => $c->id,
                'price' => $c->price,
            ]);
        }
        session()->forget('cart');
        return redirect()->back();
    }
}
