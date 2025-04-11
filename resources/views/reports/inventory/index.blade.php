@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card border border-1 border-primary">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-content" style="padding: 30px">
                                    <form method='GET' onsubmit='show();' enctype="multipart/form-data" >
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                     <label for="from" style="display: block;">From:</label>
                                                    <input type="date" id="from" name="from_date" value="{{ Request::get('from_date') }}" class="form-control" required>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="to" style="display: block;">To:</label>
                                                    <input type="date" id="to" name="end_date" value="{{ Request::get('end_date') }}" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-primary mt-4" type="submit" id='submit' style="margin-top: 14px;">Generate</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-between align-items-center">
                    New Stock
                    {{-- <button type="button" class="btn btn-md btn-outline-primary"  data-toggle="modal" data-target="#NewBookOrder">New</button> --}}
                </h4>
                <div class="table-responsive" >
                    @foreach ($groups as $group)
                        <h3>{{ $group->name }}</h3>
                        <table class="table table-bordered table-striped table-hover tablewithSearch">
                            <tr>
                                <th>Item Name</th>
                                <th>Cumulative Quantity</th>
                            </tr>
                            @foreach ($group->items as $item)
                                <tr>
                                    <td>{{ $item->item_code }}</td>
                                    <td>{{ number_format($item->cumulativeQuantity) }}</td>
                                </tr>
                            @endforeach
                        </table>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>DocNum</th>
                                <th>NumAtCard</th>
                                <th>DocDate</th>
                                <th>DocDueDate</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                @foreach ($raw_materials as $raw_material)
                                    <th>{{ $raw_material->description }}</th>
                                @endforeach
                            </tr>
                            @foreach ($group->items as $item)
                                @foreach ($item->getAllocatedOrders($startDate, $endDate) as $order)
                                    <tr>
                                        <td>{{ $order->DocNum }}</td>
                                        <td>{{ $order->NumAtCard }}</td>
                                        <td>{{ $order->DocDate }}</td>
                                        <td>{{ $order->DocDueDate }}</td>
                                        @if ($order->rdr1->isNotEmpty())
                                        @php
                                            $firstRdr1 = $order->rdr1->first();
                                            $materials = $firstRdr1->materials; 
                                            $firstMaterial = $materials[0] ?? null;
                                            $quantity = $firstRdr1->Quantity;
                                            $result = $firstMaterial ? $firstMaterial['percentage'] * $quantity : 0;
                                        @endphp
                                    
                                            <td>{{ $order->rdr1->first()->Quantity }}</td>
                                            <td>{{ $order->rdr1->first()->ItemCode }}</td>
                                            <td>
                                            {{ $result }}
                                            {{ json_encode($order->rdr1->first()->materials) }}
                                            </td> 
                                        @else
                                            <td colspan="3">No RDR1 Data</td> 
                                        @endif
                                        
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('orders.booked_orders.view')
@endsection