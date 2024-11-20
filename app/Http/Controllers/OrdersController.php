<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function order_dashboard (){
        
        return view('orders.order_dashboard');
    }

    public function new_order (){
        
        return view('orders.new_orders.index');
    }
    public function booked_orders (){
        
        return view('orders.booked_orders.index');
    }
    public function new_stock (){
        
        return view('orders.new_stock.index');
    }
}
