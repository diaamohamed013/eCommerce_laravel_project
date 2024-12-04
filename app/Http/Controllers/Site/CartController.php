<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('cart')->content();
        return view('site.pages.shopping_cart', compact('items'));
    }

    public function addToCart(Request $request)
    {
        Cart::instance('cart')->add($request->id, $request->title, $request->stock_quantity, $request->price)->associate('App\Models\Product');
        return redirect()->back();
    }

    public function increase_cart_qty($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->back();
    }

    public function decrease_cart_qty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }

    public function remove_item($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }

    public function remove_cart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }
}
