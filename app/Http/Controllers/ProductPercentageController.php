<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductPercentage;
use App\Oitm;

class ProductPercentageController extends Controller
{
    public function index()
    {
        $oitmData = Oitm::all();
        $productPercentages = ProductPercentage::all(); 
        return view('product_percentage.product_percentage', compact('productPercentages', 'oitmData'));
    }
    public function create()
    {
        $oitmData = Oitm::all();
        return view('product_percentage.product_percentage-create',compact('oitmData'));
    }
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'product_code.*' => 'required|exists:oitms,ItemCode',
    //         'quantity_percent.*' => 'nullable|numeric|max:100',
    //         'konjac32000cps.*' => 'nullable|numeric|max:100',
    //         'konjac_gum200mesh.*' => 'nullable|numeric|max:100',
    //         'konjac10000cps.*' => 'nullable|numeric|max:100',
    //         'konjac36000cps.*' => 'nullable|numeric|max:100',
    //         'agar.*' => 'nullable|numeric|max:100',
    //         'tara_gum.*' => 'nullable|numeric|max:100',
    //         'lbg_fg.*' => 'nullable|numeric|max:100',
    //         'guar_gum.*' => 'nullable|numeric|max:100',
    //         'nsg_20.*' => 'nullable|numeric|max:100',
    //         'cassia_hgs.*' => 'nullable|numeric|max:100',
    //         'cassia_gum.*' => 'nullable|numeric|max:100',
    //         'xanthan200mesh.*' => 'nullable|numeric|max:100',
    //         'xanthan80mesh.*' => 'nullable|numeric|max:100',
    //         'cmc_lv.*' => 'nullable|numeric|max:100',
    //         'cmc_hv.*' => 'nullable|numeric|max:100',
    //         'icelite2.*' => 'nullable|numeric|max:100',
    //         'mc_gel.*' => 'nullable|numeric|max:100',
    //         'non_distilled_mono_gms.*' => 'nullable|numeric|max:100',
    //         'distilled_mono.*' => 'nullable|numeric|max:100',
    //         'sodium_alginate.*' => 'nullable|numeric|max:100',
    //         'sodium_citrate.*' => 'nullable|numeric|max:100',
    //         'potassium_citrate.*' => 'nullable|numeric|max:100',
    //         'calcium_lactate.*' => 'nullable|numeric|max:100',
    //         'calcium_acetate.*' => 'nullable|numeric|max:100',
    //         'calcium_sulfate.*' => 'nullable|numeric|max:100',
    //         'kci.*' => 'nullable|numeric|max:100',
    //         'nacl.*' => 'nullable|numeric|max:100',
    //         'maltodex.*' => 'nullable|numeric|max:100',
    //         'dextrose.*' => 'nullable|numeric|max:100',
    //         'refinedsugar.*' => 'nullable|numeric|max:100',
    //         'silicon_dioxide.*' => 'nullable|numeric|max:100',
    //         'wheat_gluten.*' => 'nullable|numeric|max:100',
    //         'gellan_gum.*' => 'nullable|numeric|max:100',
    //     ]);
    
    //     foreach ($validatedData['product_code'] as $key => $value) {
    //         ProductPercentage::create([
    //             'product_code' => $validatedData['product_code'][$key],
    //             'quantity_percent' => $validatedData['quantity_percent'][$key],
    //             'konjac32000cps' => $validatedData['konjac32000cps'][$key],
    //             'konjac_gum200mesh' => $validatedData['konjac_gum200mesh'][$key],
    //             'konjac10000cps' => $validatedData['konjac10000cps'][$key],
    //             'konjac36000cps' => $validatedData['konjac36000cps'][$key],
    //             'agar' => $validatedData['agar'][$key],
    //             'tara_gum' => $validatedData['tara_gum'][$key],
    //             'lbg_fg' => $validatedData['lbg_fg'][$key],
    //             'guar_gum' => $validatedData['guar_gum'][$key],
    //             'nsg_20' => $validatedData['nsg_20'][$key],
    //             'cassia_hgs' => $validatedData['cassia_hgs'][$key],
    //             'cassia_gum' => $validatedData['cassia_gum'][$key],
    //             'xanthan200mesh' => $validatedData['xanthan200mesh'][$key],
    //             'xanthan80mesh' => $validatedData['xanthan80mesh'][$key],
    //             'cmc_lv' => $validatedData['cmc_lv'][$key],
    //             'cmc_hv' => $validatedData['cmc_hv'][$key],
    //             'icelite2' => $validatedData['icelite2'][$key],
    //             'mc_gel' => $validatedData['mc_gel'][$key],
    //             'non_distilled_mono_gms' => $validatedData['non_distilled_mono_gms'][$key],
    //             'distilled_mono' => $validatedData['distilled_mono'][$key],
    //             'sodium_alginate' => $validatedData['sodium_alginate'][$key],
    //             'sodium_citrate' => $validatedData['sodium_citrate'][$key],
    //             'potassium_citrate' => $validatedData['potassium_citrate'][$key],
    //             'calcium_lactate' => $validatedData['calcium_lactate'][$key],
    //             'calcium_acetate' => $validatedData['calcium_acetate'][$key],
    //             'calcium_sulfate' => $validatedData['calcium_sulfate'][$key],
    //             'kci' => $validatedData['kci'][$key],
    //             'nacl' => $validatedData['nacl'][$key],
    //             'maltodex' => $validatedData['maltodex'][$key],
    //             'dextrose' => $validatedData['dextrose'][$key],
    //             'refinedsugar' => $validatedData['refinedsugar'][$key],
    //             'silicon_dioxide' => $validatedData['silicon_dioxide'][$key],
    //             'wheat_gluten' => $validatedData['wheat_gluten'][$key],
    //             'gellan_gum' => $validatedData['gellan_gum'][$key],
    //         ]);
    //     }        
    
    //     return redirect()->route('inventory.product_percentage')
    //                      ->with('success', 'Inventory created successfully.');
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_code.*' => 'required|exists:oitms,ItemCode',
            'quantity_percent.*' => 'nullable|numeric|max:100',
            'konjac32000cps.*' => 'nullable|numeric|max:100',
            'konjac_gum200mesh.*' => 'nullable|numeric|max:100',
            'konjac10000cps.*' => 'nullable|numeric|max:100',
            'konjac36000cps.*' => 'nullable|numeric|max:100',
            'agar.*' => 'nullable|numeric|max:100',
            'tara_gum.*' => 'nullable|numeric|max:100',
            'lbg_fg.*' => 'nullable|numeric|max:100',
            'guar_gum.*' => 'nullable|numeric|max:100',
            'nsg_20.*' => 'nullable|numeric|max:100',
            'cassia_hgs.*' => 'nullable|numeric|max:100',
            'cassia_gum.*' => 'nullable|numeric|max:100',
            'xanthan200mesh.*' => 'nullable|numeric|max:100',
            'xanthan80mesh.*' => 'nullable|numeric|max:100',
            'cmc_lv.*' => 'nullable|numeric|max:100',
            'cmc_hv.*' => 'nullable|numeric|max:100',
            'icelite2.*' => 'nullable|numeric|max:100',
            'mc_gel.*' => 'nullable|numeric|max:100',
            'non_distilled_mono_gms.*' => 'nullable|numeric|max:100',
            'distilled_mono.*' => 'nullable|numeric|max:100',
            'sodium_alginate.*' => 'nullable|numeric|max:100',
            'sodium_citrate.*' => 'nullable|numeric|max:100',
            'potassium_citrate.*' => 'nullable|numeric|max:100',
            'calcium_lactate.*' => 'nullable|numeric|max:100',
            'calcium_acetate.*' => 'nullable|numeric|max:100',
            'calcium_sulfate.*' => 'nullable|numeric|max:100',
            'kci.*' => 'nullable|numeric|max:100',
            'nacl.*' => 'nullable|numeric|max:100',
            'maltodex.*' => 'nullable|numeric|max:100',
            'dextrose.*' => 'nullable|numeric|max:100',
            'refinedsugar.*' => 'nullable|numeric|max:100',
            'silicon_dioxide.*' => 'nullable|numeric|max:100',
            'wheat_gluten.*' => 'nullable|numeric|max:100',
            'gellan_gum.*' => 'nullable|numeric|max:100',
        ]);
    
        foreach ($validatedData['product_code'] as $key => $value) {
            // Check if the product code already exists
            if (ProductPercentage::where('product_code', $validatedData['product_code'][$key])->exists()) {
                
                return redirect()->route('product_percentage.product_percentage-create')->with('error', 'Product Code Formula already exists.');
            }
    
            // If not, proceed with storing the data
            ProductPercentage::create([
                'product_code' => $validatedData['product_code'][$key],
                            'quantity_percent' => $validatedData['quantity_percent'][$key],
                            'konjac32000cps' => $validatedData['konjac32000cps'][$key],
                            'konjac_gum200mesh' => $validatedData['konjac_gum200mesh'][$key],
                            'konjac10000cps' => $validatedData['konjac10000cps'][$key],
                            'konjac36000cps' => $validatedData['konjac36000cps'][$key],
                            'agar' => $validatedData['agar'][$key],
                            'tara_gum' => $validatedData['tara_gum'][$key],
                            'lbg_fg' => $validatedData['lbg_fg'][$key],
                            'guar_gum' => $validatedData['guar_gum'][$key],
                            'nsg_20' => $validatedData['nsg_20'][$key],
                            'cassia_hgs' => $validatedData['cassia_hgs'][$key],
                            'cassia_gum' => $validatedData['cassia_gum'][$key],
                            'xanthan200mesh' => $validatedData['xanthan200mesh'][$key],
                            'xanthan80mesh' => $validatedData['xanthan80mesh'][$key],
                            'cmc_lv' => $validatedData['cmc_lv'][$key],
                            'cmc_hv' => $validatedData['cmc_hv'][$key],
                            'icelite2' => $validatedData['icelite2'][$key],
                            'mc_gel' => $validatedData['mc_gel'][$key],
                            'non_distilled_mono_gms' => $validatedData['non_distilled_mono_gms'][$key],
                            'distilled_mono' => $validatedData['distilled_mono'][$key],
                            'sodium_alginate' => $validatedData['sodium_alginate'][$key],
                            'sodium_citrate' => $validatedData['sodium_citrate'][$key],
                            'potassium_citrate' => $validatedData['potassium_citrate'][$key],
                            'calcium_lactate' => $validatedData['calcium_lactate'][$key],
                            'calcium_acetate' => $validatedData['calcium_acetate'][$key],
                            'calcium_sulfate' => $validatedData['calcium_sulfate'][$key],
                            'kci' => $validatedData['kci'][$key],
                            'nacl' => $validatedData['nacl'][$key],
                            'maltodex' => $validatedData['maltodex'][$key],
                            'dextrose' => $validatedData['dextrose'][$key],
                            'refinedsugar' => $validatedData['refinedsugar'][$key],
                            'silicon_dioxide' => $validatedData['silicon_dioxide'][$key],
                            'wheat_gluten' => $validatedData['wheat_gluten'][$key],
                            'gellan_gum' => $validatedData['gellan_gum'][$key],
            ]);
        }  
    
        return redirect()->route('product_percentage.product_percentage')
                         ->with('success', 'product_percentage created successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_code' => '',
            'quantity_percent' => '',
            'konjac32000cps' => '',
            'konjac_gum200mesh' => '',
            'konjac10000cps' => '',
            'konjac36000cps' => '',
            'agar' => '',
            'tara_gum' => '',
            'lbg_fg' => '',
            'guar_gum' => '',
            'nsg_20' => '',
            'cassia_hgs' => '',
            'cassia_gum' => '',
            'xanthan200mesh' => '',
            'xanthan80mesh' => '',
            'cmc_lv' => '',
            'cmc_hv' => '',
            'icelite2' => '',
            'mc_gel' => '',
            'non_distilled_mono_gms' => '',
            'distilled_mono' => '',
            'sodium_alginate' => '',
            'sodium_citrate' => '',
            'potassium_citrate' => '',
            'calcium_lactate' => '',
            'calcium_acetate' => '',
            'calcium_sulfate' => '',
            'kci' => '',
            'nacl' => '',
            'maltodex' => '',
            'dextrose' => '',
            'refinedsugar' => '',
            'silicon_dioxide' => '',
            'wheat_gluten' => '',
            'gellan_gum' => '',
        ]);

        // $productPercentages->update($validatedData);
        $productPercentage = ProductPercentage::findOrFail($id);
        $productPercentage->update($validatedData);
        return redirect()->route('product_percentage.product_percentage')
                         ->with('success', 'Product Percentage updated successfully.');
    }

    public function destroy($id)
    {
        $productPercentage = ProductPercentage::findOrFail($id);
        $productPercentage->delete();

        return redirect()->route('product_percentage.product_percentage')
        ->with('success', 'Product Percentage deleted successfully.');
    }
}
