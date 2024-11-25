@extends('layouts.header')

@section('content')
    <div class="row">
        <div class="col-md-3 mb-4 stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                    <p class="text-white">Total Reserved</p>
                </div>
                <div class="card-body">
                    <p class="fs-30 mb-2">{{count($reserved)}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary card-header-radius">
                    <div class="d-flex align-items-center">
                        <p class="card-title text-white m-0">
                            Reserved
                        </p>
                        <button class="btn btn-md btn-warning ml-1" data-toggle="modal" data-target="#new">
                            New
                        </button>
                    </div>
                </div>
                <div class="card-body">
    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tablewithSearch">
                            <thead>
                                <tr>
                                    <th>Actions</th>
                                    <th>Ingredient</th>
                                    <th>Inventory (KG)</th>
                                    <th>Booked Orders</th>
                                    <th>Qty (KG)</th>
                                    <th>Product Code</th>
                                    <th>Ingredient Qty (KG)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reserved as $reserve)
                                    <tr>
                                        <td>
                                            <button title="Edit" type="button" class="btn btn-info btn-rounded btn-icon" data-toggle="modal" data-target="#edit{{$reserve->id}}">
                                                <i class="ti-pencil-alt" style="margin: -3px;"></i>
                                            </button>
    
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="ti-trash" style="margin: -3px;"></i>
                                            </button>
                                        </td>
                                        <td>{{$reserve->ingredient}}</td>
                                        <td>{{$reserve->inventory}}</td>
                                        <td>{{$reserve->book_orders}}</td>
                                        <td>{{$reserve->qty}}</td>
                                        <td>{{$reserve->product_code}}</td>
                                        <td>{{$reserve->ingredient_qty}}</td>
                                    </tr>
    
                                    @include('reserved.edit_reserved')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('reserved.new_reserved')
@endsection

@section('js')
    <script>
        
    </script>
@endsection