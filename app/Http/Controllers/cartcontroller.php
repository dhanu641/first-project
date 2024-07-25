<?php

namespace App\Http\Controllers;

use App\Models\cart;

use App\Models\addcart;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class cartcontroller extends Controller
{
    public function addcart(Request $request, $id) 
    {
        $user =auth()->id();
        $user_id = $user;

        $product_id = $id;
        $cart = cart::where('user',$user_id)->first();
        if($cart){
            $existing_products = json_decode($cart->product_id);
            array_push( $existing_products, $product_id );
            $cart->product_id = json_encode($existing_products);
            $cart->save();
        }else {
            $product_id = json_encode(array($product_id));
            $cart = cart::create(['user' => $user_id,'product_id'=> $product_id ]);
        }
    
        return redirect()->route('products.index');
    }
    
    
    public function show()
    {
        $data = addcart::get();
       foreach($data as $cart){
        $carts = json_decode($cart->cartdata, true);
       };
        return view('products.show',compact('carts'));
    }

    public function cart()
    {
        $data = cart::where('user',auth()->id())->first();
        $array_data = json_decode($data->product_id);
        $products = products::whereIn('id',$array_data)->get();
        return view('products.cart',compact('products'));
    }
      
    public function delete($id){
        $data = products::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
}