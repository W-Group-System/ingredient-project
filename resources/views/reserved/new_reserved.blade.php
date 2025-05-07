<div class="modal fade" id="new">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new reserved</h5>
            </div>
            <form method="POST" action="{{url('add-reserved')}}" onsubmit="show()">
                @csrf 

                <div class="modal-body">
                    <div class="form-group mb-2">
                        Buyers Code
                        <input type="text" name="buyers_code" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        Product Code
                        <select data-placeholder="Select Ingredient" name="product_code" class="form-control js-example-basic-single" style="width: 100%;" required>
                            <option value=""></option>
                            @foreach ($ingredients as $ingredient)
                                <option value="{{$ingredient->ItemCode}}">{{$ingredient->ItemCode}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="product_code" class="form-control" required> --}}
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>