<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BabysitterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        //,'verified'
    }

    public function index()
    {
        return view('babysitter');
    }
}
