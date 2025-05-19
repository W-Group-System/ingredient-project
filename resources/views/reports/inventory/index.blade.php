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
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <button class="btn btn-primary mt-4" type="submit" id='submit' style="margin-top: 14px;">Generate</button>
                                            </div>
                                            <div class="col-lg-3">
                                                <button class="btn btn-success mt-4" onclick="exportTablesToExcel()" style="margin-top: 14px;">Export</button>
                                            </div>
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
                        <h3 class="group-title">{{ $group->name }}</h3>
                        <table class="export-table1 table table-bordered table-striped table-hover tablewithSearch">
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
                        <table class="export-table2 table table-bordered table-striped table-hover">
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

                                            <td>{{ number_format($firstRdr1->Quantity,2) }}</td>
                                            <td>{{ $firstRdr1->ItemCode }}</td>
                                            <td class="d-flex justify-content-between"><span>{{ number_format($result, 2) }}</span> <span>({{ $firstMaterial ? $firstMaterial['percentage'] * 100 : 0 }}%)</span></td>
                                        @else
                                            @php
                                                $materials = $order->materials; 
                                                $firstMaterial = $materials[0] ?? null;
                                                $quantity = $order->qty;
                                                $result = $firstMaterial ? $firstMaterial['percentage'] * $quantity : 0;
                                                $totalResult += $result;
                                            @endphp
                                            <td>{{ number_format($order->qty,2) }}</td>
                                            <td>{{ $order->product_code }}</td>
                                            <td class="d-flex justify-content-between"><span>{{ number_format($result, 2) }}</span> <span>({{ $firstMaterial ? $firstMaterial['percentage'] * 100 : 0 }}%)</span></td>
                                        @endif
                                        @if ($order->type === 'sap')
                                            <td>{{ \Carbon\Carbon::parse($order->DocDueDate)->format('m-d-Y') }}</td>
                                        @else
                                            <td>{{ \Carbon\Carbon::parse( $order->load_date)->format('m-d-Y') }}</td>
                                        @endif
                                        @foreach ($raw_materials as $raw_material)
                                        @if ($order->type === 'sap' && $order->rdr1->isNotEmpty())
                                            <td >
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
                                               <div class="d-flex justify-content-between">
                                                    <span>  {{ $order->rdr1->first()->Quantity * $percentage == 0 ? '' : (number_format($order->rdr1->first()->Quantity * $percentage,2) ?? 'N/A') }}</span>
                                                    @if ($percentage !=0)
                                                        <span>({{ $percentage ? $percentage * 100 : "" }}%)</span>
                                                    @endif
                                                </div>
                                            </td>
                                        @else
                                            <td >
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
                                                <div class="d-flex justify-content-between">
                                                    <span>  {{ $order->qty * $percentage == 0 ? '' : (number_format($order->qty * $percentage,2) ?? 'N/A') }} </span>
                                                    @if ($percentage !=0)
                                                        <span>({{ $percentage ? $percentage * 100 : "" }}%)</span>
                                                    @endif
                                                </div>
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
                    <table id="table3" class="table table-bordered table-striped table-hover">
                        <thead>
                            <th>PR Number</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>PO Number</th>
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
                    <table id="table4" class="table table-bordered table-striped table-hover">
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
                                            
                                            {{ $sum == 0 ? 0 : number_format($sum, 2) }}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
    function exportTablesToExcel() {
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet([]);

        const tables1 = document.querySelectorAll('.export-table1');
        const tables2 = document.querySelectorAll('.export-table2');
        const titles = document.querySelectorAll('.group-title');

        let rowOffset = 0;
    
        titles.forEach((titleElem, index) => {
            const title = titleElem?.innerText || `Group ${index + 1}`;

            XLSX.utils.sheet_add_aoa(ws, [[title]], { origin: { r: rowOffset, c: 0 } });
            rowOffset++;

            XLSX.utils.sheet_add_aoa(ws, [['Table 1']], { origin: { r: rowOffset, c: 0 } });
            rowOffset++;

            const table1 = tables1[index];
            if (table1) {
                const tempSheet1 = XLSX.utils.table_to_sheet(table1);
                const data1 = XLSX.utils.sheet_to_json(tempSheet1, { header: 1 });
                XLSX.utils.sheet_add_aoa(ws, data1, { origin: { r: rowOffset, c: 0 } });
                rowOffset += data1.length + 1;
            }

            XLSX.utils.sheet_add_aoa(ws, [['Table 2']], { origin: { r: rowOffset, c: 0 } });
            rowOffset++;

            const table2 = tables2[index];
            if (table2) {
                const tempSheet2 = XLSX.utils.table_to_sheet(table2);
                const data2 = XLSX.utils.sheet_to_json(tempSheet2, { header: 1 });
                XLSX.utils.sheet_add_aoa(ws, data2, { origin: { r: rowOffset, c: 0 } });
                rowOffset += data2.length + 2; 
            }
        });

        const table3 = document.getElementById('table3');
        const ws3 = XLSX.utils.table_to_sheet(table3);
        XLSX.utils.book_append_sheet(wb, ws3, 'Incoming');

        const table4 = document.getElementById('table4');
        const ws4 = XLSX.utils.table_to_sheet(table4);
        XLSX.utils.book_append_sheet(wb, ws4, 'Raw Materials');
    
        XLSX.utils.book_append_sheet(wb, ws, 'All Groups');
        XLSX.writeFile(wb, 'report.xlsx');
    }
    </script>
    
@endsection