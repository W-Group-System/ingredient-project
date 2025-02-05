@extends('layouts.header')

@section('content')
    <div class="row">
        <div class="col-md-3 mb-4 stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                    <p class="text-white">Incomming</p>
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
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-content" style="padding: 30px">
                                    <form method='GET' onsubmit='show();' enctype="multipart/form-data" >
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                     <label for="from" style="display: block;">From:</label>
                                                    <input type="date" id="from" name="from_date" value="{{ Request::get('from_date') }}" class="form-control" required>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="to" style="display: block;">To:</label>
                                                    <input type="date" id="to" name="end_date" value="{{ Request::get('end_date') }}" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-primary mt-4" type="submit" id='submit' style="margin-top: 14px;">Generate</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            Onhand
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tablewithSearch">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Cumulative Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($uniqueIngredients as $ingredient)
                                    <tr>
                                        <td>{{ $ingredient->ItemCode }}</td>
                                        <td>{{ number_format($ingredient->cumulativeQuantity) }}</td>
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