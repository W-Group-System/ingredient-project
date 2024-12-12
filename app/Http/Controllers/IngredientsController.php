<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\OITM;
use App\OPRQ;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    // public function ingredient_dashboard (){
        
    //     return view('ingredients.dashboard');
    // }
    // public function available_ingredient (){
        
    //     return view('ingredients.available.index');
    // }
    // public function inbound_ingredient (){
        
    //     return view('ingredients.inbound.index');
    // }
    // public function outbound_ingredient (){
        
    //     return view('ingredients.outbound.index');
    // }
    // public function reserved_ingredient (){
        
    //     return view('ingredients.reserved.index');
    // }
    // public function ingredient_profile (){
        
    //     return view('ingredients.profile.index');
    // }

    public function index()
    {
        $ingredients = OITM::whereHas('ItemGroup', function ($query) {
            $query->whereIn('ItmsGrpNam', [
                'BLM-Outsourced Pure',
                'BLM-Refine Pure',
                'Chemicals',
                'Milled Chips',
                'PPW-Semi-RefinedPure',
                'Seaweeds',
            ]);
        })
        ->where('OnHand' ,'!=', '.000000')->get();
        
        $incomings = OPRQ::with(['prq1' => function($query) {
            $query->orderBy('ItemCode', 'Asc'); 
        }])->select(
            'DocNum',
            'DocEntry',
            'ReqDate',
            'U_Requestdate',
            'Comments',
            'U_SpecArea',
            'U_NotedBy',
            'DocStatus'
        )
        ->where('DocStatus' , 'O')->get();

    
        return view('raw_materials.raw_materials', compact('ingredients',  'incomings'));
    }
}
