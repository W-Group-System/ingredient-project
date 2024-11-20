<div class="modal fade" id="formCompany" tabindex="-1" role="dialog" aria-labelledby="newCompany" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 35%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCompany">Company</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST"  enctype="multipart/form-data" action="{{ url('new_company') }}">
            @csrf
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Company Code</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Company Code" name="code">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Company Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Company Name" name="company_name">
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
 