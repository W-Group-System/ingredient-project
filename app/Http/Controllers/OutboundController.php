<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Outbound;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OutboundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outbound = Outbound::get();
        $ingredients = Ingredient::where('status', null)->where('qty','>',0)->get();
        
        return view('outbound.index', compact('outbound', 'ingredients'));
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
        $ingredient = Ingredient::where('buyers_code', $request->buyers_code)->first();
        if ($request->qty > $ingredient->qty)
        {
            Alert::error('The quantity you entered exceeds the limit')->persistent('Dismiss');
            return back();
        }
        else
        {
            $current_qty = $ingredient->qty - $request->qty;
            $ingredient->qty = $current_qty;
            $ingredient->save();
            
            $outbound = new Outbound;
            $outbound->buyers_code = $request->buyers_code;
            $outbound->so_number = $request->so_number;
            $outbound->product_code = $request->product_code;
            $outbound->qty = $request->qty;
            $outbound->load_date = $request->load_date;
            $outbound->ingredient_id = $ingredient->id;
            $outbound->save();

            Alert::success('Successfully Saved')->persistent('Dismiss');
            return back();
        }
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
        $ingredient = Ingredient::where('buyers_code',$id)->first();
        
        return response()->json($ingredient);
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
        // $outbound = Ingredient::findOrFail($id);
        // $outbound->so_number = $request->so_number;
        // $outbound->save();

        // Alert::success('Successfully Added SO Number')->persistent('Dismiss');
        // return back();
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
