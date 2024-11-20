<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index () {
        $Products = Product::with([
            'productMaterialComposition'
        ])->get();
        return view('products.index', compact('Products'));
    }
}
