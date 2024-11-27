@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-3 mb-4 stretch-card">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                <p class="text-white">Total Outbound</p>
            </div>
            <div class="card-body">
                <p class="fs-30 mb-2">0</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card border border-1 border-primary">
            <div class="card-header card-header-radius bg-primary">
                <p class="m-0 card-title text-white">
                    Outbound Orders
                </p>
            </div>
            <div class="card-body">
                
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" id="sample_request_table">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Ingredient</th>
                                <th>Inventory (KG)</th>
                                <th>Booked Orders</th>
                                <th>Qty (KG)</th>
                                <th>Product Code</th>
                                <th>Ingredient Qty (KG)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reserved as $res)
                                <tr> 
                                    <td>
                                        {{-- <button type="button" class="btn btn-primary btn-rounded btn-icon"
                                            data-target="#OutboundView" data-toggle="modal" title='View'>
                                                <i class="ti-eye"></i>
                                        </button>  --}}

                                        <button type="button" title="Edit" class="btn btn-info btn-rounded btn-icon" data-toggle="modal" data-target="#edit{{$res->id}}">
                                            <i class="ti-pencil-alt text-center"></i>
                                        </button>
                                    </td>
                                    <td>{{$res->ingredient}}</td> 
                                    <td>{{$res->inventory}}</td> 
                                    <td>{{$res->book_orders}}</td>
                                    <td>{{$res->qty}}</td>
                                    <td>{{$res->product_code}}</td>
                                    <td>{{$res->ingredient_qty}}</td>
                                </tr>

                                @include('outbound.edit_so')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('ingredients.outbound.view') --}}
@endsection