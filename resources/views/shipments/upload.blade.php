<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addRole" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRole">Upload shipments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ url('shipment-import') }}" onsubmit="show()" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf

                    <div class="form-group mb-2">
                        Upload shipments
                        <input type="file" name="upload_shipments" class="form-control" required>
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