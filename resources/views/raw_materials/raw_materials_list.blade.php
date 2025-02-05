@extends('layouts.header')

@section('content')
    <div class="row">
        <div class="col-md-3 mb-4 stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                    <p class="text-white">Total Raw Materials</p>
                </div>
                <div class="card-body">
                    {{-- <p class="fs-30 mb-2">{{count($reserved->where('status','!=',null))}}</p> --}}
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
                            Total Raw Materials
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tablewithSearch table-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Raw Materials</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($raw_materials as $raw_material)
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-md btn-rounded btn-info btn-icon" data-toggle="modal" data-target="#view{{$raw_material->id}}">
                                                <i class="ti-eye" style="margin-left: -3px;"></i>
                                            </button>
                                        </td>
                                        <td>{{$raw_material->Name}}</td>
                                        {{-- @foreach ($raw_material->product_material_compositions as $pmc)
                                            {{optional($pmc->products)->code}} <br>
                                        @endforeach --}}
                                        {{-- {{dd($raw_material)}} --}}
                                    </tr>

                                    @include('raw_materials.view_raw_materials')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection