<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
<<<<<<< HEAD
        $this->middleware('auth');
=======
        $this->middleware(['auth','verified']);
>>>>>>> caf6852 (crud)
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
<<<<<<< HEAD
    public function adminHome()
    {
        return view('admin');
    }
     public function parent()
    {
        return view('parent');
    }
=======
    
    
>>>>>>> caf6852 (crud)
}
