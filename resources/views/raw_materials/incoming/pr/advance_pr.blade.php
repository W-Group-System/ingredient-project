<div class="modal fade" id="advance_pr" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Advance PR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('store-pr')}}" onsubmit="show()">
                @csrf 

                <div class="modal-body">
                    <div class="form-group mb-2">
                        Item Code
                        <select data-placeholder="Select Item" name="item_code" class="form-control js-example-basic-single" style="width: 100%;">
                            <option value=""></option>
                            @foreach ($materials as $material)
                                <option value="{{$material->ItemCode}}">{{$material->ItemCode}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        Item Name
                        <input type="text" name="item_description" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        Qty
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        PR Number
                        <input type="number" name="pr_no" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        Posting Date
                        <input type="date" name="posting_date" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>