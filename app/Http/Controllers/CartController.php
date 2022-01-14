<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
// use \Cart as Cart;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return $this->showAll($cartItems);
    }


    public function addToCart(Request $request,$id)
    {

        $product = Product::find($id);

        // \Cart::add([
        //     'id' => $id,
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'quantity' => $request->quantity,
        //     'attributes' => array(
        //         'image' => $request->image,
        //     )
        // ]);

        \Cart::add([
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $product->image,
            )
        ]);

        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return $this->showAll($cartItems);

     }

    public function updateCart(Request $request, $id)
    {
        \Cart::update(
            $id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        $cartItems = \Cart::getContent();
        // dd($cartItems);
     return response()->json([$cartItems],200);
     
       }

    public function removeCart(Request $request,$id)
    {
        \Cart::remove($id);
 

         return $this->showOne($id);
    }

    public function clearAllCart()
    {
        \Cart::clear();

        return $this->showOne();
    }
}
