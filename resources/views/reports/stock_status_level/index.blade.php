@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-between align-items-center">
                    Balance Inventory Report
                    {{-- <button type="button" class="btn btn-md btn-outline-primary"  data-toggle="modal" data-target="#NewBookOrder">New</button> --}}
                </h4>
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" >
                        <thead>
                             <tr>
                                <th>Raw Materials</th>
                                <th>Type</th>
                                <th>Available</th>
                                <th>Inbound</th>
                                <th>Outbound</th>
                                <th>Reserved</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <td>Sample Raw Materials</td>
                                <td>Sample Type</td>
                                <td>Sample Available</td>
                                <td>Sample Inbound</td>
                                <td>Sample Outbound</td>
                                <td>Sample Reserved</td>
                                <td>Sample Balance</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('orders.booked_orders.view')
@endsection