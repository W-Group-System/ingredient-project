<?php

namespace App\Http\Controllers;

use App\Reserved;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReservedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserved = Reserved::get();

        return view('reserved.index', compact('reserved'));
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
        $reserved = new Reserved;
        $reserved->ingredient = $request->ingredient;
        $reserved->inventory = $request->inventory;
        $reserved->book_orders = $request->booked_orders;
        $reserved->qty = $request->qty;
        $reserved->product_code = $request->product_code;
        $reserved->ingredient_qty = $request->ingredient_qty;
        $reserved->status = 'Reserved';
        $reserved->save();

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
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
        //
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
        $reserved = Reserved::findOrFail($id);
        $reserved->ingredient = $request->ingredient;
        $reserved->inventory = $request->inventory;
        $reserved->book_orders = $request->booked_orders;
        $reserved->qty = $request->qty;
        $reserved->product_code = $request->product_code;
        $reserved->ingredient_qty = $request->ingredient_qty;
        $reserved->save();

        Alert::success('Successfully Updated')->persistent('Dismiss');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserved = Reserved::findOrFail($id);
        $reserved->status = 'Cancelled';
        $reserved->save();
        
        Alert::success('Successfully Cancelled')->persistent('Dismiss');
        return back();
    }
}
