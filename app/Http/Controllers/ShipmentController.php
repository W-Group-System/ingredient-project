<?php

namespace App\Http\Controllers;

use App\Exports\ShipmentExport;
use App\Imports\ShipmentImport;
use App\Ingredient;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Shuchkin\SimpleXLSX;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipments = Ingredient::get();

        return view('shipments.index', compact('shipments'));
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
        //
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
        //
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

    public function shipmentExport()
    {
        return Excel::download(new ShipmentExport, 'Shipment Export Template.xlsx');
    }

    public function shipmentImport(Request $request)
    {
        $file = $request->file('upload_shipments');

        $xlsx = SimpleXLSX::parse($file);

        foreach($xlsx->rows() as $key=>$rows)
        {
            if ($key != 0)
            {
                $shipments = Ingredient::where('so_number', $rows[0])->first();
                if (empty($shipments))
                {
                    $shipments = new Ingredient;
                    $shipments->so_number = $rows[0];
                    $shipments->buyers_code = $rows[1];
                    $shipments->qty = $rows[2];
                    $shipments->product_code = $rows[3];
                    $shipments->load_date = date('Y-m-d', strtotime($rows[4]));
                    $shipments->save();
                }
                else
                {
                    $shipments->so_number = $rows[0];
                    $shipments->buyers_code = $rows[1];
                    $shipments->qty = $rows[2];
                    $shipments->product_code = $rows[3];
                    $shipments->load_date = date('Y-m-d', strtotime($rows[4]));
                    $shipments->save();
                }
            }
        }

        Alert::success('Successfully Imported')->persistent('Dismiss');
        return back();
    }
}
