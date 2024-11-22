@extends('layouts.header')

@section('content')
    <div class="row">
        <div class="col-md-3 grid-margin">
            <div class="card mb-2">
                <div class="card-body">
                    <p class="card-title">Total Reserved</p>
                    <div class="d-flex justify-content-between">
                        <div class="mb-4 mt-2">
                            <h3 class="text-primary fs-30 font-weight-medium">
                                {{ count($reserved) }}
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
                <h4 class="card-title d-flex justify-content-between align-items-center">
                    Reserved

                    <button class="btn btn-md btn-outline-primary" data-toggle="modal" data-target="#new">
                        New
                    </button>
                </h4>

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

    @include('reserved.new_reserved')
@endsection

@section('js')
    <script>
        
    </script>
@endsection