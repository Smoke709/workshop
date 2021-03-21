<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
   public function summary()
   {
       return view('site.pages.cart-summary');
   }
    public function save(Request $request)
    {
       // dd($request->all());
       $request->validate([
           'product_variation_id' => 'required'
       ]);

       $cart = \App\Models\Cart::firstOrCreate([
           'session_id'=> session()->getId()
       ]);
        
       $cart->PhotoVariations()->syncWithoutDetaching($request->product_variation_id);

       return back()->with(['successMessage'=>'product has been added to cart successfully']);
    }

    public function destroy(Request $request)
    {
        //dd($request->id);
        $cart = \App\MOdels\Cart::where('session_id',session()->getId())->first();

        $cart->PhotoVariations()->detach($request->id);

        return back();
    }

}
