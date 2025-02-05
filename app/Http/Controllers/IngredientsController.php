<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\OITM;
use App\OIVL;
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

    public function index(Request $request)
    {
        $fromDate = $request->input('from_date');
        $endDate = $request->input('end_date');
        $uniqueIngredients =[];
        $incomings =[];
        $ingredients =[];

        if($fromDate) {
            $startingBalances = OIVL::selectRaw('ItemCode, SUM(InQty) - SUM(OutQty) as balance')
            ->whereHas('item.itemGroup', function ($query) {
                $query->whereIn('ItmsGrpNam', [
                    'BLM-Outsourced Pure',
                    'BLM-Refine Pure',
                    'Chemicals',
                    'Milled Chips',
                    'PPW-Semi-RefinedPure',
                    'Seaweeds',
                ]);
            })
            ->whereHas('item.warehouse', function ($query) {
                $query->whereIn('WhsCode', ['CAR2', 'CAR']);
            })
            ->where('DocDate', '<', $fromDate) 
            ->groupBy('ItemCode')
            ->pluck('balance', 'ItemCode'); 

            $ingredients = OIVL::select(
                'InQty',
                'OutQty',
                'DocDate',
                'ItemCode'
            )
                ->whereHas('item.itemGroup', function ($query) {
                $query->whereIn('ItmsGrpNam', [
                    'BLM-Outsourced Pure',
                    'BLM-Refine Pure',
                    'Chemicals',
                    'Milled Chips',
                    'PPW-Semi-RefinedPure',
                    'Seaweeds',
                ]);
            })
            ->whereHas('item.warehouse', function ($query) {
                $query->whereIn('WhsCode', ['CAR2', 'CAR']);
            })
            ->whereBetween('DocDate', [$fromDate, $endDate])
            ->orderBy('ItemCode')
            ->orderBy('DocDate')
            ->get();

            $uniqueIngredients = $ingredients->groupBy('ItemCode')->map(function ($items, $itemCode) use ($startingBalances) {
                $runningTotal = $startingBalances[$itemCode] ?? 0; 
            
                foreach ($items->sortBy('DocDate') as $item) {
                    $runningTotal += $item->InQty; 
                    $runningTotal -= $item->OutQty; 
                }
            
                $firstItem = $items->first();
                $firstItem->cumulativeQuantity = $runningTotal; 
                return $firstItem; 
            })->values(); 
            
            $incomings = OPRQ::with(['prq1'])->select(
                'DocNum',
                'DocEntry',
                'ReqDate',
                'U_Requestdate',
                'Comments',
                'U_SpecArea',
                'U_NotedBy',
                'DocStatus'
            )->whereHas('prq1' , function($query){
                $query->where('ItemCode', 'like', '%BLM%')
                ->orWhere('ItemCode', 'like', '%PPW%')
                ->orWhere('ItemCode', 'like', '%MC%')
                ->whereIn('WhsCode', ['CAR', 'CAR2']); 
            })
            ->where('DocStatus', '!=', 'C')
            ->whereBetween('ReqDate', [$fromDate, $endDate])
            
            ->get();
        }
    
        return view('raw_materials.raw_materials', compact('uniqueIngredients',  'incomings', 'ingredients'));
    }
}
