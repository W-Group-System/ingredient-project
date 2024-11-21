@extends('layouts.header')

@section('content')
    <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card mb-2">
                <div class="card-body">
                    <p class="card-title">Total Ingredients</p>
                    <div class="d-flex justify-content-between">
                        <div class="mb-4 mt-2">
                            <h3 class="text-primary fs-30 font-weight-medium">
                                {{-- {{ count($products) }} --}}
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
                    Ingredients
                </h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover tablewithSearch" id="sample_request_table">
                        <thead>
                            <tr>
                                {{-- <th>Action</th> --}}
                                <th>Ingredients Name</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection