@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-3 mb-4 stretch-card">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary card-header-radius">
                <p class="text-white">Total Available</p>
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
            <div class="card-header bg-primary card-header-radius">
                <p class="card-title m-0 text-white">
                    Available
                </p>
            </div>
            <div class="card-body">
                
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" >
                        <thead>
                            <tr>
                                <th class="p-2">SO No.</th>
                                <th class="p-2">Buyer Code</th>
                                <th class="p-2">Qty</th>
                                <th class="p-2">Product</th>
                                <th class="p-2">Load Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($available->where('so_number','!=',null) as $a)
                                <tr>
                                    <td class="p-2">{{$a->so_number}}</td>
                                    <td class="p-2">{{$a->buyers_code}}</td>
                                    <td class="p-2">{{$a->qty}}</td>
                                    <td class="p-2">{{$a->product_code}}</td>
                                    <td class="p-2">{{date('M d, Y', strtotime($a->load_date))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('new_orders.view')
@include('new_orders.create') --}}
@endsection