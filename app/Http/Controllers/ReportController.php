<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\IngredientGroup;
use App\IngredientGroupItem;
use App\OITM;
use App\RawMaterial;
use GuzzleHttp\Client;
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
        $client = new Client();
        $response = $client->get('https://crms-wgroup.wsystem.online/api/get-products');

        $body = $response->getBody();
        $products = json_decode($body, true);
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
        }])->where('status', 1)->get();

        // $groups->load(['items.oivl', 'items.oprq']);

        $groups->each(function ($group) {
            $group->items->each(function ($item) {
                $ingredients = $item->oivl;
                $incomingIngredients = $item->oprq;
                $advancedPrs = $item->advancePr;

                $runningTotal = 0; 
                $incomingRunningTotal =0;
                $advanceRunningTotal =0;
                foreach ($ingredients->sortBy('DocDate') as $ingredient) {
                    $runningTotal += $ingredient->InQty; 
                    $runningTotal -= $ingredient->OutQty; 
                }
                foreach ($incomingIngredients->sortBy('DocDate') as $incomingIngredient) {
                    foreach ($incomingIngredient->prq1 as $prq1) {
                         $incomingRunningTotal += $prq1->Quantity;
                    }
                }
                foreach ($advancedPrs->sortBy('DocDate') as $advancedPr) {
                     $advanceRunningTotal += $advancedPr->quantity;
                }
                
                $item->cumulativeQuantity = $runningTotal;
                $item->incomingCumulativeQuantity = $advanceRunningTotal + $incomingRunningTotal;
            });
        });

        $reserved_orders =  $reserved = Ingredient::where('load_date', '<=',  $endDate)->get();

        $raw_materials = RawMaterial::all();
        $raw_materials->each(function ($material) {
            $ingredients = $material->oivl;
            $advancedPrs = $material->advancePr;
        
            $runningTotal = 0;
            $advanceRunningTotal = 0;
            foreach ($ingredients as $ingredient) {
                $runningTotal += $ingredient->InQty;
                $runningTotal -= $ingredient->OutQty;
            }
            foreach ($advancedPrs as $advancedPr) {
                $advanceRunningTotal += $advancedPr->quantity;
            }
        
            $material->cumulativeQuantity = $runningTotal;

        });

        return view('reports.inventory.index', compact('groups','startDate', 'endDate', 'raw_materials', 'products', 'reserved_orders'));
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

        // foreach ($request->input('item_code') as $ingredient) {
        //     if (in_array($ingredient, $unique_items)) {
        //         continue; 
        //     }
        //     $unique_items[] = $ingredient;

            
        //     $existing_item = IngredientGroupItem::where('group_id', $new_group->id)
        //         ->where('item_code', $ingredient)
        //         ->first();
        //     if ($existing_item) {
        //         return back()->withErrors(['item_code' => "Item code '{$ingredient}' already exists in this group."]);
        //     }
        //     $save_as_item = new IngredientGroupItem; 
        //     $save_as_item->group_id = $new_group->id; 
        //     $save_as_item->item_code = $ingredient; 
        //     $save_as_item->save(); 
        // }
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

            
            $existing_item = IngredientGroupItem::where('item_code', $ingredient)
                ->orWhere('description', $request->description[$index])
                ->first();
            if ($existing_item) {
                return back()->withErrors(['item_code or Description' => "Item already exists."]);
            }
            $save_as_item = new IngredientGroupItem; 
            $save_as_item->group_id = $request->group_id[$index]; 
            $save_as_item->item_code = $ingredient; 
            $save_as_item->description = $request->description[$index];
            $save_as_item->save(); 
        }
        return back()->with('success', 'Ingredient group created successfully.');
    }
    public function edit_ingredient(Request $request, $id)

    {
            $existing_item =  IngredientGroupItem::where('description', $request->description)
                ->first();
            if ($existing_item) {
                return back()->withErrors(['description' => "'{$request->description}' already exists."]);
            }
            $item = IngredientGroupItem::findOrFail($id); 
            $item->description = $request->description; 
            $item->save(); 
        return back()->with('success', 'Item updated successfully.');
    }

    public function delete_ingredient($id)
    {
        try { 
            $ingredeient_iitem = IngredientGroupItem::findOrFail($id); 
            $ingredeient_iitem->delete();  
            return response()->json(['success' => true, 'message' => 'Ingredient deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete Ingredient.'], 500);
        }
    }
    public function deactivate($id)
    {
        try { 
            $group = IngredientGroup::findOrFail($id); 
            $group->status = 0;
            $group->save();
            return back()->with('success', 'Ingredient group deactivated.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to deactivate ingredient group.');
        }
    }
    public function activate($id)
    {
        try { 
            $group = IngredientGroup::findOrFail($id); 
            $group->status = 1;
            $group->save();
            return back()->with('success', 'Ingredient group activated.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to activate ingredient group.');
        }
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
    public function delete_material($id)
    {
        try { 
            $raw_material = RawMaterial::findOrFail($id); 
            $raw_material->delete();  
            return response()->json(['success' => true, 'message' => 'Raw Material deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete Raw Material.'], 500);
        }
    }
    public function edit_material(Request $request, $id)
    {
        $raw_material = RawMaterial::findOrFail($id);
        $raw_material->description = $request->description;
        $raw_material->save();

        return back()->with('success', 'Material updated successfully.');
    }
}
