<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class CartController extends Controller
{
    public function index(){
       $cartItems = \Cart::getContent();

       return view('front.cart', compact('cartItems'));
    }


    public function dashboard(){
        return view('front.account');
    }
    public function addToCart($id)
    {
        $Product = Menu::find($id);
        \Cart::add([
            'id' => $Product->id,
            'name' => $Product->title,
            'price' => $Product->price,
            'quantity' => 1,
            'attributes' => array(
            'image' => $Product->thumbnail,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart($id)
    {
        \Cart::remove($id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }


}
