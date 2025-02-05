<div class="modal" id="view{{$raw_material->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View raw materials - {{$raw_material->Name}}</h5>
            </div>
            <div class="modal-body">
                @if(count($raw_material->product_material_compositions) > 0)
                    @foreach ($raw_material->product_material_compositions as $pmc)
                        @if(!empty($pmc->products))
                        {{optional($pmc->products)->code}} - {{$pmc->Percentage}}%<br>
                        <hr>
                        @endif
                    @endforeach
                @else
                <p class="text-center">No data available.</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>