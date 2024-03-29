<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\Admin\Product;

class CartController extends Controller
{
    public function index(Cart $cart) {

        return view("fe.cart",compact('cart'));
    }

    public function add(Request $request,Cart $cart)  {
        $product=Product::find($request->id);
        
        $quantity=$request->quantity;
        
        $cart->add($product,$quantity);

        return redirect()->route('cart.index');
    }
}
