@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-3 mb-4 stretch-card">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary card-header-radius">
                <p class="text-white">Total Available</p>
            </div>
            <div class="card-body">
                <p class="fs-30 mb-2">0</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-between align-items-center">
                    Available
                </h4>
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" >
                        <thead>
                            <tr>
                                {{-- <th>Action</th> --}}
                                <th>Ingredients Name</th>
                                <th>Type</th>
                                <th>Quantity</th>
                                <th>Last Restock Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                {{-- <td style="center">
                                    <button type="button" class="btn btn-primary btn-rounded btn-icon"
                                        data-target="#NewOrdersView" data-toggle="modal" title='View'>
                                    <i class="ti-eye"></i>
                                </button> 
                                </td> --}}
                                <td>Ricogel 82144</td>
                                <td>Sample Product Name</td>
                                <td>14,000</td>
                                <td>January 10, 2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('new_orders.view')
@include('new_orders.create') --}}
@endsection