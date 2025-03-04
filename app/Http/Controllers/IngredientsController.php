<?php

namespace App\Http\Controllers;

use App\AdvancePurchaseOrder;
use App\AdvancePurchaseRequest;
use App\OWOR;
use Illuminate\Support\Facades\DB;
use App\OITM;
use App\OIVL;
use App\OPOR;
use App\OPRQ;
use App\ORDR;
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
        $outbounds =[];

        if($endDate) {
            // $startingBalances = OIVL::selectRaw('ItemCode, SUM(InQty) - SUM(OutQty) as balance')
            // ->whereHas('item.itemGroup', function ($query) {
            //     $query->whereIn('ItmsGrpNam', [
            //         'BLM-Outsourced Pure',
            //         'BLM-Refine Pure',
            //         'Chemicals',
            //         'Milled Chips',
            //         'PPW-Semi-RefinedPure',
            //         'Seaweeds',
            //     ]);
            // })
            // ->whereHas('item.warehouse', function ($query) {
            //     $query->whereIn('WhsCode', ['CAR2', 'CAR']);
            // })
            // ->where('DocDate', '<', $endDate) 
            // ->groupBy('ItemCode')
            // ->pluck('balance', 'ItemCode'); 

            $ingredients = OIVL::select(
                'InQty',
                'OutQty',
                'DocDate',
                'ItemCode'
            )
                ->whereHas('item.itemGroup', function ($query) {
                $query->where('ItmsGrpNam', 'like', '%BLM%')
                ->orWhere('ItmsGrpNam', 'like', '%PPW%')
                ->orWhere('ItmsGrpNam', 'like', '%MC%')
                ;
            })
            ->whereHas('item.warehouse', function ($query) {
                $query->whereIn('WhsCode', ['CAR2', 'CAR']);
            })
            // ->whereBetween('DocDate', [$fromDate, $endDate])
            ->where('DocDate', '<=',  $endDate) 
            ->orderBy('ItemCode')
            ->orderBy('DocDate')
            ->get();

            $uniqueIngredients = $ingredients->groupBy('ItemCode')->map(function ($items, $itemCode)  {
                $runningTotal =  0; 
            
                foreach ($items->sortBy('DocDate') as $item) {
                    $runningTotal += $item->InQty; 
                    $runningTotal -= $item->OutQty; 
                }
            
                $firstItem = $items->first();
                $firstItem->cumulativeQuantity = $runningTotal; 
                return $firstItem; 
            })->values(); 
            $incomings = OPOR::with(['por1'])
            ->select(
                'DocNum',
                'DocEntry',
                'DocDate',
                'DocDueDate',
                'CardCode',
                'CardName',
                'Comments',
                'DocStatus'
            )
            ->whereHas('por1', function ($query) {
                $query->where(function ($q) {
                    $q->where('ItemCode', 'like', '%BLM%')
                    ->orWhere('ItemCode', 'like', '%PPW%')
                    ->orWhere('ItemCode', 'like', '%MC%');
                })
                ->whereIn('WhsCode', ['CAR', 'CAR2']); 
            })
            ->where('DocStatus', '!=', 'C') 
            ->where('DocDate', '<=',  $endDate) 
            ->get();
        }
    
        return view('raw_materials.raw_materials', compact('uniqueIngredients',  'incomings', 'ingredients', 'outbounds',));
    }

    // public function outbounds(Request $request)
    // {
    //     $fromDate = $request->input('from_date');
    //     $endDate = $request->input('end_date');
    //     $outbounds =[];

    //     if($fromDate) {
    //         $outbounds = OWOR::with('wor1')->select(
    //             'DocNum',
    //             'DocEntry',
    //             'ItemCode',
    //             'Status',
    //             'Type',
    //             'PlannedQty',
    //             'PostDate',
    //             'DueDate',
    //             'Warehouse'
    //         )
    //         ->where('Warehouse',  'CAR')
    //         ->whereBetween('PostDate', [$fromDate, $endDate])
            
    //         ->get();
    //     }
    
    //     return view('raw_materials.outbounds', compact( 'outbounds',));
    // }

    public function allocated(Request $request)
    {
        $fromDate = $request->input('from_date');
        $endDate = $request->input('end_date');
        // $endDate = $request->input('end_date', now()->toDateString());
        $allocateds =[];

        if($endDate) {
            $allocateds = ORDR::with('rdr1')->select(
                'DocNum',
                'DocEntry',
                'NumAtCard',
                'DocDate',
                'DocDueDate'
            )
            ->whereHas('rdr1', function ($query) {
                $query->whereIn('WhsCode', ['CAR','CAR2']);
            })
            ->where('DocStatus', 'O')
            // ->where('Printed', 'N')
            // ->whereBetween('DocDueDate', [$fromDate, $endDate])
            ->where('DocDate', '<=',  $endDate) 
            ->get();
        }
    
        return view('raw_materials.allocated', compact( 'allocateds',));
    }

    public function incoming_po(Request $request)
    {
        $endDate = $request->input('end_date', now()->toDateString());
        $incomings =[];

        if($endDate) {
            $incomings = OPOR::with(['por1'])
            ->select(
                'DocNum',
                'DocEntry',
                'DocDate',
                'DocDueDate',
                'CardCode',
                'CardName',
                'Comments',
                'DocStatus'
            )
            ->whereHas('por1', function ($query) {
                $query->where(function ($q) {
                    $q->where('ItemCode', 'like', '%BLM%')
                    ->orWhere('ItemCode', 'like', '%PPW%')
                    ->orWhere('ItemCode', 'like', '%MC%');
                })
                ->whereIn('WhsCode', ['CAR', 'CAR2']); 
            })
            ->where('DocStatus', '!=', 'C') 
            ->where('DocDate', '<=',  $endDate) 
            ->get();

            $advanced_pos = AdvancePurchaseOrder::where('posting_date', '<=',  $endDate)
            ->get();

            $poPrIds = AdvancePurchaseOrder::pluck('pr_id'); 
            $advanced_prs = AdvancePurchaseRequest::whereNotIn('id', $poPrIds)->get();
        }
    
        return view('raw_materials.incoming.po.incoming_po', compact('incomings', 'advanced_prs', 'advanced_pos'));
    }
    
    public function incoming_pr(Request $request)
    {
        $endDate = $request->input('end_date', now()->toDateString());
        $incomings =[];

        $materials = OITM::select(
            'ItemCode',
            'ItemName'
        )->where('ItemCode', 'like', '%BLM%')
        ->orWhere('ItemCode', 'like', '%PPW%')
        ->orWhere('ItemCode', 'like', '%MC%')
        ->get();
        if($endDate) {
            $incomings = OPRQ::with(['prq1'])
            ->select(
                'DocNum',
                'DocEntry',
                'DocDate',
                'DocDueDate',
                'CardCode',
                'CardName',
                'Comments',
                'DocStatus'
            )
            ->whereHas('prq1', function ($query) {
                $query->where(function ($q) {
                    $q->where('ItemCode', 'like', '%BLM%')
                    ->orWhere('ItemCode', 'like', '%PPW%')
                    ->orWhere('ItemCode', 'like', '%MC%');
                })
                ->whereIn('WhsCode', ['CAR', 'CAR2']); 
            })
            ->where('DocStatus', '!=', 'C') 
            ->where('DocDate', '<=',  $endDate) 
            ->get();

            $advanced_prs = AdvancePurchaseRequest::where('posting_date', '<=',  $endDate)
            ->doesntHave('pos')
            ->get();
        }
    
        return view('raw_materials.incoming.pr.incoming_pr', compact('incomings', 'materials', 'advanced_prs'));
    }

    public function get_items($id){
        $materials = OITM::where('ItemCode', $id)->first();
        return response()->json($materials);
    }

    public function get_pr($id){
        $purchase = AdvancePurchaseRequest::where('id', $id)->first();
        return response()->json($purchase);
    }

    public function store_pr(Request $request)
    {
        {
            $advance_pr = new AdvancePurchaseRequest();
            $advance_pr->item_code = $request->item_code;
            $advance_pr->item_description = $request->item_description;
            $advance_pr->quantity = $request->quantity;
            $advance_pr->pr_no = $request->pr_no;
            $advance_pr->posting_date = $request->posting_date;
            $advance_pr->save();

            return back();
        }
    }

    public function store_po(Request $request)
    {
        {
            $advance_po = new AdvancePurchaseOrder();
            $advance_po->pr_id = $request->pr_id;
            $advance_po->item_code = $request->item_code;
            $advance_po->item_description = $request->item_description;
            $advance_po->quantity = $request->quantity;
            $advance_po->po_no = $request->po_no;
            $advance_po->posting_date = $request->posting_date;
            $advance_po->save();

            return back();
        }
    }

    public function delete_pr($id)
    {
        $advancedPr = AdvancePurchaseRequest::findOrFail($id);
        $advancedPr->delete();

        return redirect()->back()->with('success', 'Item deleted successfully!');
    }

    public function delete_po($id)
    {
        $advancedPr = AdvancePurchaseOrder::findOrFail($id);
        $advancedPr->delete();

        return redirect()->back()->with('success', 'Item deleted successfully!');
    }
}
