@extends('layouts.header')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-left ">
                    Shipments
                </h4>
                <button type="button" class="btn btn-md btn-outline-primary" id="upload" data-toggle="modal"
                    data-target="#add">Upload</button>

                <a href="" class="btn btn-md btn-outline-success" id="export" >Export Template</a>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-bordered tablewithSearch">
                        <thead>
                            <tr>
                                <th>O/C #</th>
                                <th>PO / Heads-up date</th>
                                <th>S/C Date</th>
                                <th>SO No.</th>
                                <th>Amount</th>
                                <th>Ave % Margin</th>
                                <th>Buyer Code</th>
                                <th>Qty (MT)</th>
                                <th>Product</th>
                                <th>Original Load Date</th>
                                <th>ETD</th>
                                <th>Requested ETA</th>
                                <th>Projected ETA (based on shipping info)</th>
                                <th>Docs Status</th>
                                <th>Production Location</th>
                                <th>Destination Port / City</th>
                                <th>Country</th>
                                <th>Group</th>
                                <th></th>
                                <th>Shipment Terms</th>
                                <th>Loading Type</th>
                                <th>Health Cert</th>
                                <th>Currency</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('shipments.upload')
@endsection