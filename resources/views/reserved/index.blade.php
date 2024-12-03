@extends('layouts.header')

@section('content')
    <div class="row">
        <div class="col-md-3 mb-4 stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary" style="border-top-left-radius: 20px; border-top-right-radius:20px;">
                    <p class="text-white">Total Reserved</p>
                </div>
                <div class="card-body">
                    <p class="fs-30 mb-2">{{count($reserved)}}</p>
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
                            Reserved
                        </p>
                        <button class="btn btn-md btn-warning ml-1" data-toggle="modal" data-target="#new">
                            New
                        </button>
                    </div>
                </div>
                <div class="card-body">
    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tablewithSearch">
                            <thead>
                                <tr>
                                    <th class="p-2">Actions</th>
                                    <th class="p-2">Buyers Code</th>
                                    <th class="p-2">Product Code</th>
                                    <th class="p-2">Qty</th>
                                    <th class="p-2">Load Date</th>
                                    <th class="p-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reserved as $reserve)
                                    <tr>
                                        <td class="p-2">
                                            <button title="Edit" type="button" class="btn btn-info btn-rounded btn-icon" data-toggle="modal" data-target="#edit{{$reserve->id}}">
                                                <i class="ti-pencil-alt" style="margin: -3px;"></i>
                                            </button>
    
                                            <form method="POST" id="cancelForm{{$reserve->id}}" class="d-inline-block" action="{{url('cancel-reserved/'.$reserve->id)}}" onsubmit="show()">
                                                
                                                @csrf 
                                                <button title="Cancel" type="button" class="btn btn-danger btn-rounded btn-icon d-inline-block" onclick="cancel({{$reserve->id}})">
                                                    <i class="ti-na" style="margin: -3px;"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{$reserve->buyers_code}}</td>
                                        <td>{{$reserve->product_code}}</td>
                                        <td>{{$reserve->qty}}</td>
                                        <td>{{date('Y-m-d', strtotime($reserve->load_date))}}</td>
                                        <td>
                                            @if($reserve->status == 'Reserved')
                                            <span class="badge badge-success">
                                            @elseif($reserve->status == 'Cancelled')
                                            <span class="badge badge-danger">
                                            @endif

                                                {{$reserve->status}}
                                            </span>
                                        </td>
                                    </tr>
    
                                    @include('reserved.edit_reserved')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('reserved.new_reserved')
@endsection

@section('js')
<script>
    function cancel(id)
    {
        var form = $("#cancelForm"+id)

        Swal.fire({
            title: "Are you sure?",
            // text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, cancel it!",
            cancelButtonText: "No"
        }).then((result) => {
            if (result.isConfirmed)
            {
                form.submit();
            }
        });
    }
</script>
@endsection