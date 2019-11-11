<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutsoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CheckoutIndex()
    {
       return view('pages.checkout');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CheckoutStore(Request $request)
    {
        //
    }

    
}
