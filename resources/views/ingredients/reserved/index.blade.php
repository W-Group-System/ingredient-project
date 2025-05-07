@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-between align-items-center">
                    Reserved Orders
                    {{-- <button type="button" class="btn btn-md btn-outline-primary" data-toggle="modal" data-target="#formSampleRequest">New</button> --}}
                </h4>
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" id="sample_request_table">
                        <thead>
                             <tr>
                                <th>Action</th>
                                <th>Product Name</th>
                                <th>Ingredient Name</th>
                                <th>Buyers Name</th>
                                <th>Date of Delivery</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <td >
                                    <button type="button" class="btn btn-primary btn-rounded btn-icon"
                                        data-target="#ReservedView" data-toggle="modal" title='View'>
                                    <i class="ti-eye"></i>
                                </button> 
                                </td>
                                <td>Sample Product Number</td>  
                                <td>Sample Ingredients Name</td> 
                                <td>Sample Buyers Name</td>
                                <td>Date of Delivery</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('ingredients.reserved.view')
@endsection