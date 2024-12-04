@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-4">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary card-header-radius">
                <h5 class="header-title text-white">Low Material Stocks</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered tablewithSearch" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th class="p-2">Ingredient</th>
                                <th class="p-2">Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ingredients->where('status',null)->where('qty','<=',10) as $ingredient)
                                <tr>
                                    <td>{{$ingredient->product_code}}</td>
                                    <td>{{$ingredient->qty}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-12 col-lg-4">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary card-header-radius">
                <h5 class="header-title text-white">Reserved Ingredients</h5>
            </div>
            <div class="card-body">
                <div id="graph"></div>
                {{-- <div class="table-responsive">
                    <table class="table table-bordered tablewithSearch" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th class="p-2">Ingredient</th>
                                <th class="p-2">Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ingredients->where('status',null)->where('qty','<=',10) as $ingredient)
                                <tr>
                                    <td>{{$ingredient->product_code}}</td>
                                    <td>{{$ingredient->qty}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
            </div>
        </div>
    </div>
</div>

{{-- <script src="{{ asset('/body_css/vendors/chart.js/Chart.min.js') }}"></script> --}}
@endsection

@section('js')
<script>
    var data = {!! json_encode($reserved_array) !!}
    
    new Morris.Donut({
        element: 'graph',
        resize: true,
        data: [
            {value: data[0].reserved, label: 'Reserved'},
            {value: data[0].cancelled, label: 'Cancelled'},
        ],
        colors: ["#57B657", "#FF4747"]
        // formatter: function (x) { 
        //     console.log("x:");
            
        //     return x + "%"
        // }
        // }).on('click', function(i, row){
        //     console.log(i, row);
    });
</script>
@endsection