<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $toys = session()->get('cart', []);
        return view('checkout.index', compact('toys'));
    }

    public function store()
    {
        // your code here
    }
}
