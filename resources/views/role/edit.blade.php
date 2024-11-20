<div class="modal fade" id="EditRole{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="editRole" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 35%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addRole">Edit Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST"  enctype="multipart/form-data" action="{{ url('edit_role/' . $role->id) }}">
            @csrf
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Role Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Role Name" name="role_name" value="{{ $role->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Role Description</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Role Description" name="role_description" value="{{ $role->description }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit"  class="btn btn-success" value="Save">
            </div>
           </form>
        </div>
      </div>
    </div>
  </div>
 