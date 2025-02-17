@extends('layouts.header')

@section('content')

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
                                                {{-- <div class="col-lg-6">
                                                     <label for="from" style="display: block;">From:</label>
                                                    <input type="date" id="from" name="from_date" value="{{ Request::get('from_date') }}" class="form-control" required>
                                                </div> --}}
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
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary card-header-radius">
                    <div class="d-flex align-items-center">
                        <p class="card-title text-white m-0">
                            Outbound Ingredients
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tablewithSearch">
                            <thead>
                                <tr>
                                    {{-- <th>Action</th> --}}
                                    <th>Booked Orders</th>
                                    <th>Quantity</th>
                                    <th>Product Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allocateds as $allocated)
                                    @foreach ($allocated->rdr1 as $materials)
                                        <tr>
                                            {{-- <td>
                                                <button onclick="" type="button" class="btn btn-info btn-rounded btn-icon" title="View Raw Materials" data-toggle="modal" data-target="#viewRawMaterials{{ $outbound->DocEntry }}" ><i class="ti-eye" style="margin: -3px;"></i></button>
                                                @include('raw_materials.outbound_materials')
                                            </td> --}}
                                            <td>{{ $allocated->NumAtCard }}</td>
                                            <td>{{ $materials->Quantity }}</td>
                                            <td>{{ $materials->Dscription }}</td>
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