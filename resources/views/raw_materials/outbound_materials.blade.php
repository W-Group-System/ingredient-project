<div class="modal fade" id="viewRawMaterials{{ $outbound->DocEntry }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit reserved</h5>
            </div>
            <form method="POST"  onsubmit="show()">
                @csrf 

                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tablewithSearch">
                            <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($outbound->wor1 as $materials)
                                    <tr>
                                        <td>{{ $materials->ItemCode }}</td>
                                        <td>{{ $materials->PlannedQty }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="form-group mb-2">
                        Buyers Code
                        <input type="text" name="buyers_code" class="form-control" value="{{$reserve->buyers_code}}" required>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>