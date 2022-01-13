<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
   

    public function cartList(){
        $cartItem = \Cart::getContent();

        echo $cartItem;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        \Cart::add([
            'id'=> $request->id,
            'name'=> $request->name,
            'price'=> $request->price,
            'quantity'=>$request->quantity,
            'attributes'=> array(
                'image'=> $request->image,
            )
            ]);

            echo 'success';

    }

   

 

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request, Product $product)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative'=>false,
                    'value'=>$request->quantity
                ],
            ]
            );
  echo 'updated';

    }


    public function removeCart(Request $request){
        \Cart::remove($request->id);

        echo 'removed';

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function clearALlCart()
    {
        \Cart::clear();
        echo 'celar all';

    }
}
