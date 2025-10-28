<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index () {
        // $Products = Product::with([
        //     'productMaterialComposition'
        // ])->get();
        
        $get_products = file_get_contents(env('GET_PRODUCT'));
        $products = json_decode($get_products);
        
        return view('products.index', compact('products'));
    }
}
