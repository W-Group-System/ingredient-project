@extends('layouts.header')

@section('content')
    <div class="row">
        {{-- <div class="col-md-3 mb-4 stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                    <p class="text-white">Total Shipment</p>
                </div>
                <div class="card-body">
                    <p class="fs-30 mb-2">{{count($shipments)}}</p>
                </div>
            </div>
        </div> --}}
        <div class="col-md-3 mb-4 stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                    <p class="text-white">Total Inbound</p>
                </div>
                <div class="card-body">
                    <p class="fs-30 mb-2">{{count($shipments)}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header card-header-radius bg-primary">
                    <div class="d-flex align-items-center">
                        <p class="card-title text-white m-0">
                            Shipments
                        </p>
                        <button type="button" class="btn btn-md btn-warning ml-1" id="upload" data-toggle="modal"data-target="#add">Upload</button>
                        <a href="{{url('shipment-export')}}" class="btn btn-md btn-success ml-1" id="export" >Export Template</a>
                    </div>
                </div>
                <div class="card-body">
    
    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-bordered tablewithSearch">
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
                                @foreach ($shipments as $shipment)
                                    <tr>
                                        <td class="p-2">{{$shipment->so_no}}</td>
                                        <td class="p-2">{{$shipment->buyer_code}}</td>
                                        <td class="p-2">{{$shipment->qty}}</td>
                                        <td class="p-2">{{$shipment->product}}</td>
                                        <td class="p-2">{{date('M d, Y', strtotime($shipment->load_date))}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shipments.upload')
@endsection