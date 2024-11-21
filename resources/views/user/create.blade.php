<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="addRole" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRole">Add new user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ url('add-user') }}" onsubmit="show()">
                    @csrf
                    {{-- <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Full Name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Email Address" name="email">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" placeholder="Confirm Password"
                                name="confirm_password">
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select data-placeholder="Select role" name="role" class="form-control js-example-basic-single" style="width: 100%;" required>
                                <option value=""></option>
                                @foreach ($roles as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
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
</div>