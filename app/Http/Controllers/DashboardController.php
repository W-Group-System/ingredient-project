<?php

namespace App\Http\Controllers;

use App\OINV;
use App\INV;
use App\INV1;
use App\OINV_PBI;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
          
            $query = OINV::where('DocStatus', 'O')->get();
            
        
            return view('dashboard.dashboard', compact('query'));
    }
}
