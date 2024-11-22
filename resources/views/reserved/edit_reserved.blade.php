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
                        Ingredient
                        <input type="text" name="ingredient" class="form-control" value="{{$reserve->ingredient}}" required>
                    </div>
                    <div class="form-group mb-2">
                        Inventory (KG)
                        <input type="text" name="inventory" class="form-control" value="{{$reserve->inventory}}" required>
                    </div>
                    <div class="form-group mb-2">
                        Booked Orders
                        <input type="text" name="booked_orders" class="form-control" value="{{$reserve->book_orders}}" required>
                    </div>
                    <div class="form-group mb-2">
                        Qty (KG)
                        <input type="text" name="qty" class="form-control" value="{{$reserve->qty}}" required>
                    </div>
                    <div class="form-group mb-2">
                        Product Code
                        <input type="text" name="product_code" class="form-control" value="{{$reserve->product_code}}" required>
                    </div>
                    <div class="form-group mb-2">
                        Ingredient Qty (KG)
                        <input type="text" name="ingredient_qty" class="form-control" value="{{$reserve->ingredient_qty}}" required>
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