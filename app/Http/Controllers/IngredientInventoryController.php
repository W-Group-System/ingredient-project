<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Ingredient;
use App\BookedOrder;
use App\Oitm;
use App\ProductPercentage;

class IngredientInventoryController extends Controller
{
    public function index(){
        $ingredients = Ingredient::all();
        $inventories = Inventory::all();
    
        // Organize ingredients and inventories by groupid
        $ingredientGroups = [];
        foreach ($ingredients as $ingredient) {
            $groupid = $ingredient->groupid;
            if (!isset($ingredientGroups[$groupid])) {
                $ingredientGroups[$groupid] = [
                    'ingredients' => [],
                    'inventories' => []
                ];
            }
            $ingredientGroups[$groupid]['ingredients'][] = $ingredient;
        }
    
        foreach ($inventories as $inventory) {
            $groupid = $inventory->groupid;
            if (isset($ingredientGroups[$groupid])) {
                $ingredientGroups[$groupid]['inventories'][] = $inventory;
            }
        }
    
        return view('inventory.ingredients-inventory', compact('ingredientGroups'));
    }
    
}
