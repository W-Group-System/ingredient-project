<?php

namespace App\Http\Controllers;

use App\Ingredient;
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
        $reserved = Ingredient::get();

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
        $reserved = new Ingredient;
        $reserved->buyers_code = $request->buyers_code;
        $reserved->qty = $request->qty;
        $reserved->product_code = $request->product_code;
        $reserved->load_date = $request->load_date;
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
        $reserved = Ingredient::findOrFail($id);
        $reserved->buyers_code = $request->buyers_code;
        $reserved->qty = $request->qty;
        $reserved->product_code = $request->product_code;
        $reserved->load_date = $request->load_date;
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
        $reserved = Ingredient::findOrFail($id);
        $reserved->status = 'Cancelled';
        $reserved->save();
        
        Alert::success('Successfully Cancelled')->persistent('Dismiss');
        return back();
    }
}
