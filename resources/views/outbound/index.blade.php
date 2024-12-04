@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-3 mb-4 stretch-card">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                <p class="text-white">Total Outbound</p>
            </div>
            <div class="card-body">
                <p class="fs-30 mb-2">{{count($outbound)}}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card border border-1 border-primary">
            <div class="card-header card-header-radius bg-primary">
                <p class="m-0 card-title text-white">
                    Outbound Orders
                    <button class="btn btn-warning" data-toggle="modal" data-target="#new">New</button>
                </p>
            </div>
            <div class="card-body">
                
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" id="sample_request_table">
                        <thead>
                            <tr>
                                {{-- <th class="p-2">Actions</th> --}}
                                <th class="p-2">SO Number</th>
                                <th class="p-2">Buyers Code</th>
                                <th class="p-2">Product Code</th>
                                <th class="p-2">Qty</th>
                                <th class="p-2">Load Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($outbound as $out)
                                <tr> 
                                    {{-- <td class="p-2">
                                        <button type="button" title="Edit" class="btn btn-info btn-rounded btn-icon" data-toggle="modal" data-target="#edit{{$out->id}}">
                                            <i class="ti-pencil-alt text-center"></i>
                                        </button>
                                    </td> --}}
                                    <td class="p-2">{{$out->so_number}}</td>
                                    <td class="p-2">{{$out->buyers_code}}</td> 
                                    <td class="p-2">{{$out->product_code}}</td>
                                    <td class="p-2">{{$out->qty}}</td>
                                    <td class="p-2">{{date('M d, Y', strtotime($out->load_date))}}</td>
                                </tr>

                                {{-- @include('outbound.edit_so') --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('outbound.new')
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('[name="buyers_code"]').on('change', function() {
            var id = $(this).val();

            $.ajax({
                type: "GET",
                url: "{{url('edit-outbound')}}/"+id,
                success: function(res) {
                    $("[name='so_number']").val(res.so_number);
                    $("[name='product_code']").val(res.product_code);
                    $("[name='qty']").val(res.qty);
                    $("[name='load_date']").val(res.load_date);
                }
            })
        })
        
    })
</script>
@endsection