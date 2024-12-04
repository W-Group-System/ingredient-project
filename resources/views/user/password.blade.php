<div class="modal fade" id="password{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="addRole" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRole">Change password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('change-password/'.$user->id) }}" onsubmit="show()">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group row">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>