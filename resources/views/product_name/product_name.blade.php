@extends('layouts.app')
@section('content')

<div class="wrapper">
    <div class="content-page">
        <div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                    <h4 class="page-title">Product Name</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('product_name.create') }}" class="btn btn-primary">Create New Product</a>
        <div class="table-responsive">
            <table id="table" class="table table-hover dt-responsive nowrap w-100 tables">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Product Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productname as $product)
                        <tr>
                            {{-- <td>{{ $item->oitm ? $item->oitm->ItemName : ''}}</td>  --}}
                            <td>{{ $product->type == 0 ? 'Pure Carrageenan' : 'Non-Pure Carrageenan' }}</td>
                            <td>{{$product->product_name}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProductNameModal{{ $product->id }}">Edit</button>
                                <form action="{{ route('product_name.destroy', $product) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">-</button>
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="editProductNameModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="editInventoryLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editInventoryLabel{{ $product->id }}">Edit Inventory</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('product_name.update', $product->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="type">Product Type</label>
                                                <select class="form-control type" id="type" name="type">
                                                    <option value="" disabled>Select Product Type</option>
                                                    <option value="0" {{ $product->type == 0 ? 'selected' : '' }}>Pure Carrageenan</option>
                                                    <option value="1" {{ $product->type == 1 ? 'selected' : '' }}>Non-Pure Carrageenan</option>
                                                </select>
                                            </div>                                            
                                            <div class="form-group">
                                                <label for="product_name">Product Name</label>
                                                <input type="text" class="form-control quantity" id="product_name" name="product_name" value="{{ $product->product_name }}">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
</div>
</div>

    </div>
</div>
</div>
</div>

@endsection
