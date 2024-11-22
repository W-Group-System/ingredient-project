@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-3 grid-margin">
        <div class="card mb-2">
            <div class="card-body">
                <p class="card-title">Total Products</p>
                <div class="d-flex justify-content-between">
                    <div class="mb-4 mt-2">
                        <h3 class="text-primary fs-30 font-weight-medium">
                            {{ count($products) }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-left mb-1">
                Products
                {{-- <button type="button" class="btn btn-md btn-outline-primary" id="addSrfBtn" data-toggle="modal"
                    data-target="#formSampleRequest">New</button> --}}
            </h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover tablewithSearch" id="sample_request_table">
                    <thead>
                        <tr>
                            {{-- <th>Action</th> --}}
                            <th>Product Code</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (collect($products)->sortByDesc('id') as $product)
                        <tr>
                            {{-- <td>
                                <button type="button" class="btn btn-primary btn-rounded btn-icon"
                                    data-target="#ProductComposition{{ $product->id }}" data-toggle="modal"
                                    title='View'>
                                    <i class="ti-eye"></i>
                                </button>
                            </td> --}}
                            <td>{{ $product->code }}</td>
                            <td>
                                @if($product->type == 1)
                                Pure
                                @else
                                Blend
                                @endif
                            </td>
                            {{-- <td>Ricogel 82144</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- @foreach ( $Products as $product )
@include('products.composition')
@endforeach --}}
@endsection