<div class="modal fade" id="NewMaterial" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Ingredient</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('add_material')}}" onsubmit="show()">
                @csrf 
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <div class="form-group mb-2">
                            Ingredient
                            <select data-placeholder="Select Ingredient" name="item_code[]" class="form-control js-example-basic-single" style="width: 100%;" required>
                                <option value=""></option>
                                @foreach ($ingredients as $ingredient)
                                    <option value="{{$ingredient->ItemCode}}">{{$ingredient->ItemCode}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            Ingredient Description
                            <input type="text" class="form-control" name="description[]">
                        </div>
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