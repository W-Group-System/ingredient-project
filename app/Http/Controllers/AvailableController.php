<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\OIVL;
use App\OPRQ;
use App\Shipment;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use stdClass;

class AvailableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $available = Ingredient::select(
                '*',
                DB::raw("'available' as type") 
            )
            ->where('status',null)
            ->where('qty', '>', 0)
            ->where(function($q)use($search) {
                $q->where('product_code', 'LIKE', '%'.$search.'%');
            })
            ->get();
        
        // $startingBalances = OIVL::selectRaw('ItemCode, SUM(InQty) - SUM(OutQty) as balance')
        //     ->whereHas('item.itemGroup', function ($query) {
        //         $query->whereIn('ItmsGrpNam', [
        //             'BLM-Outsourced Pure',
        //             'BLM-Refine Pure',
        //             'Chemicals',
        //             'Milled Chips',
        //             'PPW-Semi-RefinedPure',
        //             'Seaweeds',
        //         ]);
        //     })
        //     ->whereHas('item.warehouse', function ($query) {
        //         $query->whereIn('WhsCode', ['CAR2', 'CAR']);
        //     })
        //     // ->where('DocDate', '<', $fromDate) 
        //     ->groupBy('ItemCode')
        //     ->pluck('balance', 'ItemCode'); 

        $ingredients = OIVL::select(
            'InQty',
            'OutQty',
            'DocDate',
            'ItemCode',
            DB::raw("'ingredients' as type") 
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
        ->where(function($q)use($search) {
            $q->where('ItemCode', 'LIKE', '%'.$search.'%');
        })
        // ->whereBetween('DocDate', [$fromDate, $endDate])
        ->orderBy('ItemCode')
        ->orderBy('DocDate')
        ->get();
            
        $uniqueIngredients = $ingredients->groupBy('ItemCode')->map(function ($items, $itemCode) {
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
            'DocStatus',
            DB::raw("'incoming' as type") 
        )->whereHas('prq1' , function($query){
            $query->where('ItemCode', 'like', '%BLM%')
            ->orWhere('ItemCode', 'like', '%PPW%')
            ->orWhere('ItemCode', 'like', '%MC%')
            ->whereIn('WhsCode', ['CAR', 'CAR2']); 
        })
        ->where('DocStatus', '!=', 'C')
        ->whereHas('prq1', function($q)use($search) {
            $q->where('ItemCode', 'LIKE', '%'.$search.'%');
        })
        ->get();

        $ingredients_all = $available->concat($uniqueIngredients)->concat($incomings);

        $page = request()->get('page', 1);
        $perPage = 10;
        $paginatedResults = new LengthAwarePaginator(
            $ingredients_all->forPage($page, $perPage),
            $ingredients_all->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        // dd($ingredients_all);
        return view('available.index', compact('paginatedResults','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
