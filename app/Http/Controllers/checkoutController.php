<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class checkoutController extends Controller
{
    public function index()
    {
        return view ('site.pages.checkout');
    }

    public function saveEmail(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email'=> 'required|email'
        ]);
        session()->put('checkout_email',$request->email);

        return redirect('/payment');




    }

}
