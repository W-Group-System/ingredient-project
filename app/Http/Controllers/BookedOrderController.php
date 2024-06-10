<?php

namespace App\Http\Controllers;

use App\BookedOrder;
use Illuminate\Http\Request;

class BookedOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $bookedOrders = BookedOrder::all();
    return response()->view('booked_order.booked_order_type', compact('bookedOrders'));
}

public function store(Request $request)
{
    // Validate request data
    $request->validate([
        'name' => 'required|unique:roles|max:255',
        'type' => 'required|max:255',

    ]);

    // Create new role
    $role = BookedOrder::create($request->all());

    // return response()->json(['success' => true, 'role' => $role]);
    return redirect()->route('booked_order.booked_order_type')->with('success', 'Booked Order created successfully!');
}
}
