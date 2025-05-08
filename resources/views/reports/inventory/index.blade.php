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
                                    <form method='GET' onsubmit="show()" enctype="multipart/form-data" >
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
                    {{-- New Stock --}}
                    {{-- <button type="button" class="btn btn-md btn-outline-primary"  data-toggle="modal" data-target="#NewBookOrder">New</button> --}}
                </h4>
                <div class="table-responsive" >
                    @php
                        $global_raw_material_totals = [];
                        foreach ($raw_materials as $raw_material) {
                            $global_raw_material_totals[$raw_material->description] = 0;
                        }
                    @endphp
                    @foreach ($groups as $group)
                        <h3>{{ $group->name }}</h3>
                        <table class="table table-bordered table-striped table-hover tablewithSearch">
                            <tr>
                                <th>Item Name</th>
                                <th>Cumulative Quantity</th>
                            </tr>
                            @php 
                                $totalCumulative = 0;
                                $totalResult = 0;
                            @endphp
                            @foreach ($group->items as $item)
                            {{-- @php $totalCumulative += $item->cumulativeQuantity; @endphp --}}
                            @php
                                $totalCumulative += $item->cumulativeQuantity + $item->incomingCumulativeQuantity;
                            @endphp
                                <tr>
                                    <td>{{ $item->item_code }}</td>
                                    <td>{{ number_format($item->cumulativeQuantity,2) }}</td>
                                </tr>
                                <tr>
                                    <td>Incoming {{ $item->item_code }}</td>
                                    <td>{{ number_format($item->incomingCumulativeQuantity, 2) }}</td>
                                </tr>
                            @endforeach
                        </table>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>Doc Number</th>
                                <th>Booked Orders</th>
                                {{-- <th>DocDate</th> --}}
                                <th>Qty (KG)</th>
                                <th>Product Code</th>
                                <th>Ingredient Qty (KG)</th>
                                <th>Loading Date</th>
                                @foreach ($raw_materials as $raw_material)
                                    <th>{{ $raw_material->description }}</th>
                                @endforeach
                            </tr>
                            @php
                                $raw_material_totals = [];
                                foreach ($raw_materials as $raw_material) {
                                    $raw_material_totals[$raw_material->description] = 0;
                                }
                            @endphp
                            @foreach ($group->items as $item)
                                @foreach ($item->getAllocatedOrders($startDate, $endDate) as $order)
                                    <tr>
                                        @if ($order->type === 'sap')
                                            <td>{{ $order->DocNum }}</td>
                                            <td>{{ $order->NumAtCard }}</td>
                                        @else
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->buyers_code }}</td>
                                        @endif
                                        {{-- <td>{{ $order->DocDate }}</td> --}}
                                        @if ($order->type === 'sap' && $order->rdr1->isNotEmpty())
                                            @php
                                                $firstRdr1 = $order->rdr1->first();
                                                $materials = $firstRdr1->materials; 
                                                $firstMaterial = $materials[0] ?? null;
                                                $quantity = $firstRdr1->Quantity;
                                                $result = $firstMaterial ? $firstMaterial['percentage'] * $quantity : 0;
                                                $totalResult += $result;
                                            @endphp

                                            <td>{{ $firstRdr1->Quantity }}</td>
                                            <td>{{ $firstRdr1->ItemCode }}</td>
                                            <td>{{ number_format($result, 2) }}</td>
                                        @else
                                            @php
                                                $materials = $order->materials; 
                                                $firstMaterial = $materials[0] ?? null;
                                                $quantity = $order->qty;
                                                $result = $firstMaterial ? $firstMaterial['percentage'] * $quantity : 0;
                                                $totalResult += $result;
                                            @endphp
                                            <td>{{ $order->qty }}</td>
                                            <td>{{ $order->product_code }}</td>
                                            <td>{{ number_format($result, 2) }}</td>
                                        @endif
                                        @if ($order->type === 'sap')
                                            <td>{{ $order->DocDueDate }}</td>
                                        @else
                                            <td>{{ $order->load_date }}</td>
                                        @endif
                                        @foreach ($raw_materials as $raw_material)
                                        @if ($order->type === 'sap' && $order->rdr1->isNotEmpty())
                                            <td>
                                                @php
                                                    $percentage = null;
                                                    foreach ($order->rdr1 as $item) {
                                                        $percentage = getMaterialPercentage($products, $item->ItemCode, $raw_material->description);
                                                        if ($percentage) break;
                                                    }
                                                    $value = $order->rdr1->first()->Quantity * $percentage;
                        
                                                    if ($value != 0 && $value !== null) {
                                                        $raw_material_totals[$raw_material->description] += $value;
                                                        $global_raw_material_totals[$raw_material->description] += $value;
                                                    }
                                                @endphp
                                                {{ $order->rdr1->first()->Quantity * $percentage == 0 ? '' : ($order->rdr1->first()->Quantity * $percentage ?? 'N/A') }}
                                            </td>
                                        @else
                                            <td>
                                                @php
                                                    // $percentage = null;
                                                    // foreach ($order->rdr1 as $item) {
                                                        $percentage = getMaterialPercentage($products, $order->product_code, $raw_material->description);
                                                        // if ($percentage) break;
                                                    // }
                                                    $value = $order->qty * $percentage;
                        
                                                    if ($value != 0 && $value !== null) {
                                                        $raw_material_totals[$raw_material->description] += $value;
                                                        $global_raw_material_totals[$raw_material->description] += $value;
                                                    }
                                                @endphp
                                                {{ $order->qty * $percentage == 0 ? '' : ($order->qty * $percentage ?? 'N/A') }}
                                            </td>
                                        @endif
                                        @endforeach

                                    </tr>
                                @endforeach
                            @endforeach
                            <tfoot>
                                @php
                                    $roundedTotalResult = round($totalResult, 2);
                                    $roundedTotalCumulative = round($totalCumulative, 2);
                                @endphp
                                <td colspan="4"></td>
                                <td><strong>{{ number_format($totalResult, 2) }}</strong></td>
                                <td><strong>{{ number_format($roundedTotalCumulative - $roundedTotalResult , 2) }}</strong></td>
                                @foreach ($raw_materials as $raw_material)
                                    <td><strong>{{ $raw_material_totals[$raw_material->description] == 0 ? '' : number_format($raw_material_totals[$raw_material->description], 2) }}</strong></td>
                                @endforeach
                            </tfoot>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive" >
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <th>PR Number</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                        </thead>
                        @php
                            $totals = []; 

                            foreach ($raw_materials as $raw_material) {
                                $rawMaterialTotal = 0;
                                
                                foreach ($raw_material->oprq as $prs) {
                                    foreach ($prs->prq1->where('ItemCode', $raw_material->item_code) as $prLines) {
                                        $qty = $prLines->OpenQty <= 0 ? $prLines->Quantity : $prLines->OpenQty;
                                        $rawMaterialTotal += $qty;
                                    }
                                }
                                foreach ($raw_material->advancePr as $advancePurchase) {
                                        $qty = $advancePurchase->quantity;
                                        $rawMaterialTotal += $qty;
                                }

                                $totals[$raw_material->item_code] = [
                                    'item_code' => $raw_material->item_code,
                                    'total' => $rawMaterialTotal
                                ];
                            }
                        @endphp
                        <tbody>
                            @foreach ($raw_materials as $raw_material)
                                @foreach ($raw_material->oprq as $prs)
                                    @foreach ($prs->prq1->where('ItemCode', $raw_material->item_code) as $prLines)
                                        <tr>
                                            <td>{{ ($prs)->DocNum }}</td>
                                            <td>{{ ($raw_material)->description }}</td>
                                            <td>
                                                @php
                                                    $qty = $prLines->OpenQty <= 0 ? $prLines->Quantity : $prLines->OpenQty;
                                                @endphp
                                                {{ number_format($qty, 2) }}
                                            </td>
                                            <td>
                                                {{ getPONumber($prLines) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                @if ($raw_material->advancePr)
                                    @foreach ($raw_material->advancePr as $advancePrs)
                                        <tr>
                                            <td>{{ ($advancePrs)->id }}</td>
                                            <td>{{ ($raw_material)->description }}</td>
                                            <td>
                                                @php
                                                    $qty = $advancePrs->quantity;
                                                @endphp
                                                {{ number_format($qty, 2) }}
                                            </td>
                                            <td>
                                                {{ $advancePrs->pos->po_no }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive" >
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                                @foreach ($raw_materials as $raw_material)
                                    <th>{{ $raw_material->description }}</th>
                                @endforeach
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($raw_materials as $raw_material)
                                    <td>
                                        {{ $global_raw_material_totals[$raw_material->description] == 0 ? '' : number_format($global_raw_material_totals[$raw_material->description], 2) }}
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($raw_materials as $raw_material)
                                    <td> {{ number_format($raw_material->cumulativeQuantity, 2) }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($raw_materials as $raw_material)
                                    @php
                                        $info = $totals[$raw_material->item_code] ?? null;
                                    @endphp
                                    <td>
                                        {{ $info ? number_format($info['total'], 2) : '0.00' }}
                                    </td>
                                @endforeach
                                {{-- @foreach ($raw_materials as $raw_material)
                                    @php
                                        $info = $totals[$raw_material->item_code] ?? null;
                                        var_dump($totals)
                                    @endphp
                                    <td>
                                        {{ $info ? number_format($info['total'], 2) : '0.00' }}
                                    </td>
                                @endforeach --}}
                            </tr>
                            <tr>
                                @foreach ($raw_materials as $raw_material)
                                    <td>
                                       <strong>
                                            @php
                                                $info = $totals[$raw_material->item_code] ?? null;
                                                $sum = ($raw_material->cumulativeQuantity + ($info ? $info['total'] : 0)) 
                                                    - ($global_raw_material_totals[$raw_material->description] ?? 0);
                                            @endphp
                                            
                                            {{ $sum == 0 ? '' : number_format($sum, 2) }}
                                       </strong>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   
</div>
@include('orders.booked_orders.view')
@endsection