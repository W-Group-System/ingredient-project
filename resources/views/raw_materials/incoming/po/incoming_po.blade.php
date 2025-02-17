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
                            Incoming PO
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
                                    <th>PO No.</th>
                                    <th>Posting Date</th>
                                    <th>Required Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incomings as $data)
                                    @foreach ($data->por1 as $incoming)
                                        <tr>
                                            <td>{{ $incoming->ItemCode }}</td>
                                            <td>{{ $incoming->Dscription }}</td>
                                            <td>{{ $data->DocNum }}</td>
                                            <td>{{ $data->DocDate }}</td>
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
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary card-header-radius">
                    <div class="d-flex align-items-center">
                        <p class="card-title text-white m-0">
                            Advance PO
                            <button class="btn btn-warning" data-toggle="modal" data-target="#advance_po">Advance PO</button>
                            @include('raw_materials.incoming.po.advance_po')
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tablewithSearch">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Item Code</th>
                                    <th>Item Description</th>
                                    <th>PO No.</th>
                                    <th>Posting Date</th>
                                    <th>Required Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($advanced_pos as $incoming)
                                    <tr>
                                        <td>
                                            <form action="{{ url('delete_po', $incoming->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                        <td>{{ $incoming->item_code }}</td>
                                        <td>{{ $incoming->item_description }}</td>
                                        <td>{{ $incoming->po_no }}</td>
                                        <td>{{ $incoming->posting_date }}</td>
                                        <td>{{ number_format($incoming->quantity,2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('[name="pr_id"]').on('change', function(){
            var id = $(this).val();

            $.ajax({
                type:"GET",
                url: "{{ url('get_pr') }}/"+id,
                success: function(data) {
                    $("[name='item_description']").val(data.item_description);
                    $("[name='quantity']").val(data.quantity);
                    $("[name='item_code']").val(data.item_code);
                }
            })
        })
    })
</script>
@endsection