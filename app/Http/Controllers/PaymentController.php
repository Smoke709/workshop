<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('site.pages.payment');
    }

    public function show()
    {
        return view('site.pages.payment');

    }


}
