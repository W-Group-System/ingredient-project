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
</div>
{{-- @foreach ( $Products as $product )
@include('products.composition')
@endforeach --}}
@endsection