<div class="modal fade" id="editGroup{{ $group->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('edit_groups/'. $group->id)}}" onsubmit="show()">
                @csrf 
                <div class="modal-body">
                    <div class="form-group mb-2">
                        Group Name 
                        <input type="text" name="name" class="form-control" value="{{ $group->name }}" required>
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