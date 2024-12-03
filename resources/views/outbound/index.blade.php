@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-3 mb-4 stretch-card">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                <p class="text-white">Total Outbound</p>
            </div>
            <div class="card-body">
                <p class="fs-30 mb-2">{{count($outbound->where('status','Reserved')->where('so_number',null))}}</p>
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
                                <th class="p-2">Actions</th>
                                <th class="p-2">Buyers Code</th>
                                <th class="p-2">Product Code</th>
                                <th class="p-2">Qty</th>
                                <th class="p-2">Load Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($outbound->where('status','Reserved')->where('so_number',null) as $res)
                                <tr> 
                                    <td class="p-2">
                                        <button type="button" title="Edit" class="btn btn-info btn-rounded btn-icon" data-toggle="modal" data-target="#edit{{$res->id}}">
                                            <i class="ti-pencil-alt text-center"></i>
                                        </button>
                                    </td>
                                    <td class="p-2">{{$res->buyers_code}}</td> 
                                    <td class="p-2">{{$res->product_code}}</td>
                                    <td class="p-2">{{$res->qty}}</td>
                                    <td class="p-2">{{date('M d, Y', strtotime($res->load_date))}}</td>
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