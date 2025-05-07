@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-3 mb-4 stretch-card">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                <p class="text-white">Total Inbound</p>
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
                <p class="card-title text-white m-0">
                    Inbound Orders
                    {{-- <button type="button" class="btn btn-md btn-warning"  data-toggle="modal" data-target="#formSampleRequest">New</button> --}}
                </p>
            </div>
            <div class="card-body">
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" >
                        <thead>
                            <tr>
                                {{-- <th>Action</th> --}}
                                <th>SO No.</th>
                                <th>Buyer Code</th>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Load Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shipments as $shipment)
                                <tr> 
                                    {{-- <td style="center">
                                        <button type="button" class="btn btn-primary btn-rounded btn-icon" data-target="#InboundView" data-toggle="modal" title='View'>
                                            <i class="ti-eye"></i>
                                        </button> 
                                    </td> --}}
                                    <td>{{$shipment->so_no}}</td>
                                    <td>{{$shipment->buyer_code}}</td>
                                    <td>{{$shipment->qty}}</td>
                                    <td>{{$shipment->product}}</td>
                                    <td>{{date('M d Y', strtotime($shipment->load_date))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('ingredients.inbound.view') --}}
@endsection