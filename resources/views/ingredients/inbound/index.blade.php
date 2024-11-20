@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-between align-items-center">
                    Inbound Orders
                    {{-- <button type="button" class="btn btn-md btn-outline-primary" id="addSrfBtn" data-toggle="modal" data-target="#formSampleRequest">New</button> --}}
                </h4>
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" >
                        <thead>
                             <tr>
                                <th>Action</th>
                                <th>Ingredients Name</th>
                                <th>Purchase Order #</th>
                                <th>Supplier Name</th>
                                <th>DOA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <td style="center">
                                    <button type="button" class="btn btn-primary btn-rounded btn-icon"
                                        data-target="#InboundView" data-toggle="modal" title='View'>
                                    <i class="ti-eye"></i>
                                </button> 
                                </td>
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
@include('ingredients.inbound.view')
@endsection