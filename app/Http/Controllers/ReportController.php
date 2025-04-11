<?php

namespace App\Http\Controllers;

use App\IngredientGroup;
use App\IngredientGroupItem;
use App\OITM;
use App\RawMaterial;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->from_date ?? now();
        $endDate = $request->end_date ?? now(); 
        // $response = file_get_contents(env('GET_PRODUCT'), 'https://crms-wgroup.wsystem.online/');
        // $raw_materials = null;
        // $raw_materials = json_decode($response, true);
// dd($raw_materials);
        $groups = IngredientGroup::with(['items' => function ($query) use ($startDate, $endDate) {
            $query->with(['oivl' => function ($q) use ($startDate, $endDate) {
                $q->select('InQty', 'OutQty', 'DocDate', 'ItemCode')
                ->whereHas('item.itemGroup', function ($query) {
                    $query->where('ItmsGrpNam', 'like', '%BLM%')
                        ->orWhere('ItmsGrpNam', 'like', '%PPW%')
                        ->orWhere('ItmsGrpNam', 'like', '%MC%');
                })
                ->whereHas('item.warehouse', function ($query) {
                    $query->whereIn('WhsCode', ['CAR2', 'CAR']);
                })
                ->where('DocDate', '<=',  $endDate) 
                ->orderBy('ItemCode')
                ->orderBy('DocDate');
            }]);      
        }])->get();

        $groups->each(function ($group) {
            $group->items->each(function ($item) {
                $ingredients = $item->oivl;
                
                $runningTotal = 0; 
                foreach ($ingredients->sortBy('DocDate') as $ingredient) {
                    $runningTotal += $ingredient->InQty; 
                    $runningTotal -= $ingredient->OutQty; 
                }
                
                $item->cumulativeQuantity = $runningTotal;
            });
        });

        $raw_materials = RawMaterial::all();

        return view('reports.inventory.index', compact('groups','startDate', 'endDate', 'raw_materials'));
    }

    public function ingredient_groupings(Request $request)
    {
        $groups = IngredientGroup::all();
        $ingredients = OITM::select('ItemCode')->get();
        return view('group.index',compact('groups','ingredients'));
    }
    public function new_group(Request $request)

    {
        $existing_group = IngredientGroup::where('name', $request->name)->first();
        if ($existing_group) {
            return back()->withErrors(['name' => 'The ingredient group name must be unique.']);
        }
        $new_group = new IngredientGroup;
        $new_group->name = $request->name;
        $new_group->status = 1;
        $new_group->save();
        $unique_items = []; 

        foreach ($request->input('item_code') as $ingredient) {
            if (in_array($ingredient, $unique_items)) {
                continue; 
            }
            $unique_items[] = $ingredient;

            
            $existing_item = IngredientGroupItem::where('group_id', $new_group->id)
                ->where('item_code', $ingredient)
                ->first();
            if ($existing_item) {
                return back()->withErrors(['item_code' => "Item code '{$ingredient}' already exists in this group."]);
            }
            $save_as_item = new IngredientGroupItem; 
            $save_as_item->group_id = $new_group->id; 
            $save_as_item->item_code = $ingredient; 
            $save_as_item->save(); 
        }
        return back()->with('success', 'Ingredient group created successfully.');
    }
    public function view_group(Request $request, $id)
    {
        $group = IngredientGroup::where('id', $id)->first();
        $ingredients = OITM::select('ItemCode')->get();
        return view('group.view',compact('group','ingredients'));
    }
    public function add_ingredient(Request $request)

    {
        $unique_items = []; 

        foreach ($request->input('item_code') as $index=> $ingredient) {
            if (in_array($ingredient, $unique_items)) {
                continue; 
            }
            $unique_items[] = $ingredient;

            
            $existing_item = IngredientGroupItem::where('group_id', $request->group_id[$index])
                ->where('item_code', $ingredient)
                ->first();
            if ($existing_item) {
                return back()->withErrors(['item_code' => "Item code '{$ingredient}' already exists in this group."]);
            }
            $save_as_item = new IngredientGroupItem; 
            $save_as_item->group_id = $request->group_id[$index]; 
            $save_as_item->item_code = $ingredient; 
            $save_as_item->description = $request->description[$index];
            $save_as_item->save(); 
        }
        return back()->with('success', 'Ingredient group created successfully.');
    }

    public function raw_materials(Request $request)
    {
        $raw_materials = RawMaterial::all();
        $ingredients = OITM::select('ItemCode')->get();
        return view('group.raw_materials.index',compact('raw_materials','ingredients'));
    }

    public function add_material(Request $request)

    {
        $unique_items = []; 

        foreach ($request->input('item_code') as $index=> $ingredient) {
            if (in_array($ingredient, $unique_items)) {
                continue; 
            }
            $unique_items[] = $ingredient;

            
            $existing_item = RawMaterial::where('item_code', $ingredient)
                ->first();
            if ($existing_item) {
                return back()->withErrors(['item_code' => "Item code '{$ingredient}' already exists in this group."]);
            }
            $save_as_item = new RawMaterial; 
            $save_as_item->item_code = $ingredient; 
            $save_as_item->description = $request->description[$index];
            $save_as_item->save(); 
        }
        return back()->with('success', 'Ingredient group created successfully.');
    }
}
