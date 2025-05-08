<div class="modal fade" id="editRawMaterial{{  $raw_material->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Raw Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('edit_material/'. $raw_material->id)}}" onsubmit="show()">
                @csrf 
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <div class="form-group mb-2">
                            Ingredient
                            <input type="text" class="form-control" name="item_code" value="{{ $raw_material->item_code }}" readonly>
                        </div>
                        <div class="form-group">
                            Ingredient Description
                            <input type="text" class="form-control" name="description" value="{{ $raw_material->description }}">
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