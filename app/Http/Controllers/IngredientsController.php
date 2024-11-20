<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    public function ingredient_dashboard (){
        
        return view('ingredients.dashboard');
    }
    public function available_ingredient (){
        
        return view('ingredients.available.index');
    }
    public function inbound_ingredient (){
        
        return view('ingredients.inbound.index');
    }
    public function outbound_ingredient (){
        
        return view('ingredients.outbound.index');
    }
    public function reserved_ingredient (){
        
        return view('ingredients.reserved.index');
    }
    public function ingredient_profile (){
        
        return view('ingredients.profile.index');
    }


}
