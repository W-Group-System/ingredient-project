@extends('layouts.header')

@section('content')
    <div class="row">
        <div class="col-md-3 mb-4 stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                    <p class="text-white">Total Ingredients</p>
                </div>
                <div class="card-body">
                    {{-- <p class="fs-30 mb-2">{{count($reserved->where('status','!=',null))}}</p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary card-header-radius">
                    <div class="d-flex align-items-center">
                        <p class="card-title text-white m-0">
                            Ingredients
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tablewithSearch">
                            <thead>
                                <tr>
                                    {{-- <th>Action</th> --}}
                                    <th>Item No</th>
                                    <th>Item Description</th>
                                    <th>In Stock</th>
                                    <th>Bar Code</th>
                                    <th>Item Group</th>
                                    {{-- <th>Manufacturer</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingredients as $ingredient)
                                    <tr>
                                        {{-- <td>{{ $ingredients }}</td> --}}
                                        <td>{{ $ingredient->ItemCode }}</td>
                                        <td>{{ $ingredient->ItemName }}</td>
                                        <td>{{ $ingredient->OnHand }}</td>
                                        <td>{{ $ingredient->CodeBars }}</td>
                                        <td>{{ $ingredient->ItemGroup->ItmsGrpNam }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary card-header-radius">
                    <div class="d-flex align-items-center">
                        <p class="card-title text-white m-0">
                            Incoming Ingredients
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tablewithSearch">
                            <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Item Description</th>
                                    <th>PR No.</th>
                                    <th>Required Date</th>
                                    <th>Required Quantity</th>
                                    <th>Target Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incomings as $data)
                                    @foreach ($data->prq1 as $incoming)
                                        <tr>
                                            <td>{{ $incoming->ItemCode }}</td>
                                            <td>{{ $incoming->Dscription }}</td>
                                            <td>{{ $data->DocNum }}</td>
                                            <td>{{ $data->ReqDate }}</td>
                                            <td>{{ number_format($incoming->Quantity,2) }}</td>
                                            <td>{{ number_format($incoming->OpenQty,2) }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection