@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-3 grid-margin">
              <div class="card mb-2">
                    <div class="card-body">
                          <p class="card-title">Available</p>
                          <div class="d-flex justify-content-between">
                              <div class="mb-4 mt-2">
                                  <h3 class="text-primary fs-30 font-weight-medium">
                                      {{ '0' }}
                                  </h3>
                              </div>
                              <div class="mt-3">
                                  <a href="#" class="text-info">View all</a>
                              </div> 
                          </div>
                    </div>
              </div>
        </div>
        <div class="col-md-3 grid-margin">
            <div class="card mb-2">
                  <div class="card-body">
                        <p class="card-title">Inbound</p>
                        <div class="d-flex justify-content-between">
                            <div class="mb-4 mt-2">
                                <h3 class="text-primary fs-30 font-weight-medium">
                                    {{ '0' }}
                                </h3>
                            </div>
                            <div class="mt-3">
                                <a href="#" class="text-info">View all</a>
                            </div> 
                        </div>
                  </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin">
            <div class="card mb-2">
                <div class="card-body">
                        <p class="card-title">Outbound</p>
                        <div class="d-flex justify-content-between">
                            <div class="mb-4 mt-2">
                                <h3 class="text-primary fs-30 font-weight-medium">
                                    {{ '0' }}
                                </h3>
                            </div>
                            <div class="mt-3">
                                <a href="#" class="text-info">View all</a>
                            </div> 
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin">
            <div class="card mb-2">
                  <div class="card-body">
                        <p class="card-title">Reserved</p>
                        <div class="d-flex justify-content-between">
                            <div class="mb-4 mt-2">
                                <h3 class="text-primary fs-30 font-weight-medium">
                                    {{ '0' }}
                                </h3>
                            </div>
                            <div class="mt-3">
                                <a href="#" class="text-info">View all</a>
                            </div> 
                        </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" >
                        <thead>
                             <tr>
                                <th>Action</th>
                                <th>Product Name</th>
                                <th>Supplier</th>
                                <th>Storage Condition</th>
                                <th>Category</th>
                                <th>Expiration Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary btn-rounded btn-icon"
                                        data-target="#NewOrdersView" data-toggle="modal" title='View'>
                                    <i class="ti-eye"></i>
                                </button> 
                                </td>
                                <td>Ricogel 82144</td>
                                <td>Supplier</td>
                                <td>Outbound</td>
                                <td>Category</td>
                                <td>January 10, 2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('orders.new_orders.view')
@include('orders.new_orders.create')
@endsection