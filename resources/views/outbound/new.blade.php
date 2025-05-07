<div class="modal fade" id="new" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new outbound</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('store-outbound')}}" onsubmit="show()">
                @csrf 

                <div class="modal-body">
                    <div class="form-group mb-2">
                        Buyers Code
                        <select data-placeholder="Select buyers code" name="buyers_code" class="form-control js-example-basic-single" style="width: 100%;">
                            <option value=""></option>
                            @foreach ($ingredients as $ingredient)
                                <option value="{{$ingredient->buyers_code}}">{{$ingredient->buyers_code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        SO Number
                        <input type="text" name="so_number" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        Product Code
                        <input type="text" name="product_code" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        Qty
                        <input type="number" name="qty" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        Load Date
                        <input type="date" name="load_date" class="form-control" required>
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