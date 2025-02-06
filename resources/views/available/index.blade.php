@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-3 mb-4 stretch-card">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary card-header-radius">
                <p class="text-white">Total Available</p>
            </div>
            <div class="card-body">
                <p class="fs-30 mb-2">{{$paginatedResults->total()}}</p>
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
                <form method="GET" onsubmit="show()">
                    <div class="mb-3 d-flex align-items-center justify-content-end">

                        <input type="search" name="search" id="" placeholder="Search" class="form-control form-control-sm w-25" value="{{$search}}">
                    </div>
                </form>
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>SO No.</th>
                                <th>Buyer Code</th>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Load Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paginatedResults as $result)
                                @if($result->type == 'available')
                                    <tr>
                                        <td></td>
                                        <td>{{$result->buyers_code}}</td>
                                        <td>{{number_format($result->qty)}}</td>
                                        <td>{{$result->product_code}}</td>
                                        <td>{{date('M d, Y', strtotime($result->load_date))}}</td>
                                    </tr>
                                @endif

                                @if($result->type == 'ingredients')
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>{{number_format($result->cumulativeQuantity)}}</td>
                                        <td>{{$result->ItemCode}}</td>
                                        <td>{{date('M d, Y', strtotime($result->DocDate))}}</td>
                                    </tr>
                                @endif

                                @if($result->type == 'incoming')
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            @foreach ($result->prq1 as $prq1)
                                            {{number_format($prq1->Quantity)}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($result->prq1 as $prq1)
                                            {{$prq1->ItemCode}}
                                            @endforeach
                                        </td>
                                        <td>
                                            {{date('M d, Y', strtotime($result->ReqDate))}}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {!! $paginatedResults->links() !!}
                @php
                    $total = $paginatedResults->total();
                    $currentPage = $paginatedResults->currentPage();
                    $perPage = $paginatedResults->perPage();
                    
                    $from = ($currentPage - 1) * $perPage + 1;
                    $to = min($currentPage * $perPage, $total);
                @endphp

                <p  class="mt-3">{{"Showing {$from} to {$to} of {$total} entries"}}</p>
            </div>
        </div>
    </div>
</div>
{{-- @include('new_orders.view')
@include('new_orders.create') --}}
@endsection