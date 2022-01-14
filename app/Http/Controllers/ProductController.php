<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
 
 use Session;


class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return $this->showAll($products);

    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // Session::put('cart',$cart);
 
        return $this->showOne($product);

    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return $this->successMessage('no product yet added to cart',200);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return response()->json([$cart],200);
    }
}
