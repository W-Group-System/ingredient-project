<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;
use stdClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ingredients = Ingredient::get();

        $reserved_array = [];
        $object = new stdClass;
        $object->reserved = count($ingredients->where('status',null));
        $object->cancelled = count($ingredients->where('status','Cancelled'));
        $reserved_array[] = $object;
        
        return view('home', compact('ingredients', 'reserved_array'));
    }
}
