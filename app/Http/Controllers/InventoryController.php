<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Ingredient;
use App\BookedOrder;
use App\IncomingIngredient;
use App\Oitm;
use App\ProductName;
use App\ProductPercentage;



class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::with('bookedOrder','oitm')->get();
        $bookedOrders = BookedOrder::all();
        $oitmData = Oitm::all();
        $productPercentages = ProductPercentage::all();
        return view('inventory.inventory', compact('inventory', 'bookedOrders', 'oitmData', 'productPercentages'));
    }
    public function create()
    {
        $productname = ProductName::all(); 
        $bookedOrders = BookedOrder::all();
        $oitmData = Oitm::all();
        $productPercentages = ProductPercentage::all();
        return view('inventory.inventory-create', compact('bookedOrders', 'oitmData', 'productPercentages', 'productname'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'booked_order_id' => 'required|array',
            'booked_order_id.*' => 'required|exists:booked_orders,id',
            'product_code' => 'required|array',
            'product_code.*' => 'required|exists:oitms,ItemCode',
            
            'quantity' => 'required|array',
            'quantity.*' => 'required|numeric',
            
            'ending_inventoryDate' => 'nullable|array',
            'ending_inventoryDate.*' => 'nullable|date',
            
            'ending_inventoryChar' => 'nullable|array',
            'ending_inventoryChar.*' => 'nullable|string',
            
            'ingredient_quantity' => 'nullable|array',
            'ingredient_quantity.*' => 'numeric|min:0',
            
            'groupid' => 'nullable|array',
            'groupid.*' => 'string',
            
            'konjac32000cps_percent' => 'nullable|array',
            'konjac32000cps_percent.*' => 'numeric|min:0',
            
            'konjac_gum200mesh_percent' => 'nullable|array',
            'konjac_gum200mesh_percent.*' => 'numeric|min:0',
            
            'konjac10000cps_percent' => 'nullable|array',
            'konjac10000cps_percent.*' => 'numeric|min:0',
            
            'konjac36000cps_percent' => 'nullable|array',
            'konjac36000cps_percent.*' => 'numeric|min:0',
            
            'agar_percent' => 'nullable|array',
            'agar_percent.*' => 'numeric|min:0',
            
            'tara_gum_percent' => 'nullable|array',
            'tara_gum_percent.*' => 'numeric|min:0',
            
            'lbg_fg_percent' => 'nullable|array',
            'lbg_fg_percent.*' => 'numeric|min:0',
            
            'guar_gum_percent' => 'nullable|array',
            'guar_gum_percent.*' => 'numeric|min:0',
            
            'nsg_20_percent' => 'nullable|array',
            'nsg_20_percent.*' => 'numeric|min:0',
            
            'cassia_hgs_percent' => 'nullable|array',
            'cassia_hgs_percent.*' => 'numeric|min:0',
            
            'cassia_gum_percent' => 'nullable|array',
            'cassia_gum_percent.*' => 'numeric|min:0',
            
            'xanthan200mesh_percent' => 'nullable|array',
            'xanthan200mesh_percent.*' => 'numeric|min:0',
            
            'xanthan80mesh_percent' => 'nullable|array',
            'xanthan80mesh_percent.*' => 'numeric|min:0',
            
            'cmc_lv_percent' => 'nullable|array',
            'cmc_lv_percent.*' => 'numeric|min:0',
            
            'cmc_hv_percent' => 'nullable|array',
            'cmc_hv_percent.*' => 'numeric|min:0',
            
            'icelite2_percent' => 'nullable|array',
            'icelite2_percent.*' => 'numeric|min:0',
            
            'mc_gel_percent' => 'nullable|array',
            'mc_gel_percent.*' => 'numeric|min:0',
            
            'non_distilled_mono_gms_percent' => 'nullable|array',
            'non_distilled_mono_gms_percent.*' => 'numeric|min:0',
            
            'distilled_mono_percent' => 'nullable|array',
            'distilled_mono_percent.*' => 'numeric|min:0',
            
            'sodium_alginate_percent' => 'nullable|array',
            'sodium_alginate_percent.*' => 'numeric|min:0',
            
            'sodium_citrate_percent' => 'nullable|array',
            'sodium_citrate_percent.*' => 'numeric|min:0',
            
            'potassium_citrate_percent' => 'nullable|array',
            'potassium_citrate_percent.*' => 'numeric|min:0',
            
            'calcium_lactate_percent' => 'nullable|array',
            'calcium_lactate_percent.*' => 'numeric|min:0',
            
            'calcium_acetate_percent' => 'nullable|array',
            'calcium_acetate_percent.*' => 'numeric|min:0',
            
            'calcium_sulfate_percent' => 'nullable|array',
            'calcium_sulfate_percent.*' => 'numeric|min:0',
            
            'kci_percent' => 'nullable|array',
            'kci_percent.*' => 'numeric|min:0',
            
            'nacl_percent' => 'nullable|array',
            'nacl_percent.*' => 'numeric|min:0',
            
            'maltodex_percent' => 'nullable|array',
            'maltodex_percent.*' => 'numeric|min:0',
            
            'dextrose_percent' => 'nullable|array',
            'dextrose_percent.*' => 'numeric|min:0',
            
            'refinedsugar_percent' => 'nullable|array',
            'refinedsugar_percent.*' => 'numeric|min:0',
            
            'silicon_dioxide_percent' => 'nullable|array',
            'silicon_dioxide_percent.*' => 'numeric|min:0',
            
            'wheat_gluten_percent' => 'nullable|array',
            'wheat_gluten_percent.*' => 'numeric|min:0',
            
            'gellan_gum_percent' => 'nullable|array',
            'gellan_gum_percent.*' => 'numeric|min:0',

        ]);
        foreach ($validatedData['booked_order_id'] as $key => $value) {
            Inventory::create([
                'booked_order_id' => $validatedData['booked_order_id'][$key],
                'product_code' => $validatedData['product_code'][$key],
                'quantity' => $validatedData['quantity'][$key],
                'ingredient_quantity' => $validatedData['ingredient_quantity'][$key],
                'groupid' => $validatedData['groupid'][$key],
                'ending_inventoryDate' => $validatedData['ending_inventoryDate'][$key],
                'ending_inventoryChar' => $validatedData['ending_inventoryChar'][$key],
                'konjac32000cps_percent' => $validatedData['konjac32000cps_percent'][$key],
                'konjac_gum200mesh_percent' => $validatedData['konjac_gum200mesh_percent'][$key],
                'konjac10000cps_percent' => $validatedData['konjac10000cps_percent'][$key],
                'konjac36000cps_percent' => $validatedData['konjac36000cps_percent'][$key],
                'agar_percent' => $validatedData['agar_percent'][$key],
                'tara_gum_percent' => $validatedData['tara_gum_percent'][$key],
                'lbg_fg_percent' => $validatedData['lbg_fg_percent'][$key],
                'guar_gum_percent' => $validatedData['guar_gum_percent'][$key],
                'nsg_20_percent' => $validatedData['nsg_20_percent'][$key],
                'cassia_hgs_percent' => $validatedData['cassia_hgs_percent'][$key],
                'cassia_gum_percent' => $validatedData['cassia_gum_percent'][$key],
                'xanthan200mesh_percent' => $validatedData['xanthan200mesh_percent'][$key],
                'xanthan80mesh_percent' => $validatedData['xanthan80mesh_percent'][$key],
                'cmc_lv_percent' => $validatedData['cmc_lv_percent'][$key],
                'cmc_hv_percent' => $validatedData['cmc_hv_percent'][$key],
                'icelite2_percent' => $validatedData['icelite2_percent'][$key],
                'mc_gel_percent' => $validatedData['mc_gel_percent'][$key],
                'non_distilled_mono_gms_percent' => $validatedData['non_distilled_mono_gms_percent'][$key],
                'distilled_mono_percent' => $validatedData['distilled_mono_percent'][$key],
                'sodium_alginate_percent' => $validatedData['sodium_alginate_percent'][$key],
                'sodium_citrate_percent' => $validatedData['sodium_citrate_percent'][$key],
                'potassium_citrate_percent' => $validatedData['potassium_citrate_percent'][$key],
                'calcium_lactate_percent' => $validatedData['calcium_lactate_percent'][$key],
                'calcium_acetate_percent' => $validatedData['calcium_acetate_percent'][$key],
                'calcium_sulfate_percent' => $validatedData['calcium_sulfate_percent'][$key],
                'kci_percent' => $validatedData['kci_percent'][$key],
                'nacl_percent' => $validatedData['nacl_percent'][$key],
                'maltodex_percent' => $validatedData['maltodex_percent'][$key],
                'dextrose_percent' => $validatedData['dextrose_percent'][$key],
                'refinedsugar_percent' => $validatedData['refinedsugar_percent'][$key],
                'silicon_dioxide_percent' => $validatedData['silicon_dioxide_percent'][$key],
                'wheat_gluten_percent' => $validatedData['wheat_gluten_percent'][$key],
                'gellan_gum_percent' => $validatedData['gellan_gum_percent'][$key],


            ]);
        }
    
        return redirect()->route('inventory.inventory')
                         ->with('success', 'Inventory created successfully.');
    }

    public function ingredientStore(Request $request)
{
    $validatedData = $request->validate([
        'ingredient' => 'required|array',
        'ingredient.*' => 'required|string',
        'inventoryPerkg' => 'required|array',
        'inventoryPerkg.*' => 'required|numeric',
        'groupid' => 'required|array',
        'groupid.*' => 'required|string',
    ]);

    foreach ($validatedData['ingredient'] as $key => $value) {
        Ingredient::create([
            'ingredient' => $validatedData['ingredient'][$key],
            'inventoryPerkg' => $validatedData['inventoryPerkg'][$key],
            'groupid' => $validatedData['groupid'][$key],
        ]);
    }

    return response()->json(['success' => 'Inventory created successfully.']);
}

public function incomingIngredientStore(Request $request)
{
    $validatedData = $request->validate([
        'product_name_id' => 'required|array',
        'product_name_id.*' => 'required|numeric',
        'pr_no' => 'array',
        'pr_no.*' => 'nullable',
        'po_no' => 'array',
        'po_no.*' => 'nullable',
        'qty' => 'array',
        'qty.*' => 'nullable',
        'incominggroupId' => 'required|array',
        'incominggroupId.*' => 'required|string',
    ]);

    foreach ($validatedData['product_name_id'] as $key => $value) {
        IncomingIngredient::create([
            'pr_no' => $validatedData['pr_no'][$key],
            'po_no' => $validatedData['po_no'][$key],
            'qty' => $validatedData['qty'][$key],
            'product_name_id' => $validatedData['product_name_id'][$key],
            'incoming_groupId' => $validatedData['incominggroupId'][$key],

        ]);
    }

    return response()->json(['success' => 'Incoming Inventory created successfully.']);
}

    public function update(Request $request, Inventory $inventory)
    {
        $validatedData = $request->validate([
            'booked_order_id' => 'required|exists:booked_orders,id',
            'product_code' => 'required|exists:oitms,ItemCode',
            'quantity' => 'required|numeric',
            'ingredient_quantity' => 'numeric|min:0',
            'konjac32000cps_percent' => 'numeric|min:0',
            'konjac_gum200mesh_percent' => 'numeric|min:0',
            'konjac10000cps_percent' => 'numeric|min:0',
            'konjac36000cps_percent' => 'numeric|min:0',
            'agar_percent' => 'numeric|min:0',
            'tara_gum_percent' => 'numeric|min:0',
            'lbg_fg_percent' => 'numeric|min:0',
            'guar_gum_percent' => 'numeric|min:0',
            'nsg_20_percent' => 'numeric|min:0',
            'cassia_hgs_percent' => 'numeric|min:0',
            'cassia_gum_percent' => 'numeric|min:0',
            'xanthan200mesh_percent' => 'numeric|min:0',
            'xanthan80mesh_percent' => 'numeric|min:0',
            'cmc_lv_percent' => 'numeric|min:0',
            'cmc_hv_percent' => 'numeric|min:0',
            'icelite2_percent' => 'numeric|min:0',
            'mc_gel_percent' => 'numeric|min:0',
            'non_distilled_mono_gms_percent' => 'numeric|min:0',
            'distilled_mono_percent' => 'numeric|min:0',
            'sodium_alginate_percent' => 'numeric|min:0',
            'sodium_citrate_percent' => 'numeric|min:0',
            'potassium_citrate_percent' => 'numeric|min:0',
            'calcium_lactate_percent' => 'numeric|min:0',
            'calcium_acetate_percent' => 'numeric|min:0',
            'calcium_sulfate_percent' => 'numeric|min:0',
            'kci_percent' => 'numeric|min:0',
            'nacl_percent' => 'numeric|min:0',
            'maltodex_percent' => 'numeric|min:0',
            'dextrose_percent' => 'numeric|min:0',
            'refinedsugar_percent' => 'numeric|min:0',
            'silicon_dioxide_percent' => 'numeric|min:0',
            'wheat_gluten_percent' => 'numeric|min:0',
            'gellan_gum_percent' => 'numeric|min:0',
        ]);

        $inventory->update($validatedData);

        return redirect()->route('inventory.inventory')
                         ->with('success', 'Inventory updated successfully.');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventory.inventory')
                         ->with('success', 'Inventory deleted successfully.');
    }
}
