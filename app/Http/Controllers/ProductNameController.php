<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductName;

class ProductNameController extends Controller
{
    public function index()
    {
        $productname = ProductName::all(); 
        return view('product_name.product_name', compact('productname'));
    }

    public function create()
    {
        $productname = ProductName::all(); 
        return view('product_name.create' , compact('productname'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type.*' => 'required',
            'product_name.*' => 'required',
        ]);
    
        foreach ($validatedData['product_name'] as $key => $value) {
            if (ProductName::where('product_name', $validatedData['product_name'][$key])->exists()) {
                
                return redirect()->route('product_name.create')->with('error', 'Product Name already exists.');
            }
            ProductName::create([
                'type' => $validatedData['type'][$key],
                'product_name' => $validatedData['product_name'][$key],
            ]);
        }  
    
        return redirect()->route('product_name.product_name')
                         ->with('success', 'product_name created successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type' => '',
            'product_name' => '',
        ]);

        $productName = ProductName::findOrFail($id);
        $productName->update($validatedData);
        return redirect()->route('product_name.product_name')
                         ->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $productName = ProductName::findOrFail($id);
        $productName->delete();

        return redirect()->route('product_name.product_name')
        ->with('success', 'Product Name deleted successfully.');
    }
}
