<div class="modal fade" id="edit{{$reserve->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit reserved</h5>
            </div>
            <form method="POST" action="{{url('update-reserved/'.$reserve->id)}}" onsubmit="show()">
                @csrf 

                <div class="modal-body">
                    <div class="form-group mb-2">
                        Buyers Code
                        <input type="text" name="buyers_code" class="form-control" value="{{$reserve->buyers_code}}" required>
                    </div>
                    <div class="form-group mb-2">
                        Product Code
                        <input type="text" name="product_code" class="form-control" value="{{$reserve->product_code}}" required>
                    </div>
                    <div class="form-group mb-2">
                        Qty
                        <input type="number" name="qty" class="form-control" value="{{$reserve->qty}}" required>
                    </div>
                    <div class="form-group mb-2">
                        Load Date
                        <input type="date" name="load_date" class="form-control" value="{{$reserve->load_date}}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>