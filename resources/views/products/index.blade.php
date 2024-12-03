@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-3 mb-4 stretch-card">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                <p class="text-white">Total Products</p>
            </div>
            <div class="card-body">
                <p class="fs-30 mb-2">{{count($products)}}</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary card-header-radius">
                <p class="card-title text-left m-0 text-white my-1">Products</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover tablewithSearch" id="sample_request_table" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th class="p-2">Product Code</th>
                                <th class="p-2">Raw Materials</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (collect($products)->sortByDesc('id') as $product)
                            <tr>
                                <td class="p-2">{{ $product->product }}</td>
                                <td class="p-2">
                                    @foreach ($product->material_name as $raw_mats)
                                        {{$raw_mats}} <br>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection