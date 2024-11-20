<div class="modal fade" id="ProductComposition{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="editSrf" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 60%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSrf">Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tables">
                    <thead>
                        <tr>
                            <th>Material</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->productMaterialComposition as $pmc)
                            <tr>
                                <td>
                                    {{$pmc->rawMaterials->Name}}
                                </td>
                                <td>
                                    {{$pmc->Percentage}}%
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

      </div>
    </div>
  </div>
 