@extends('layouts.app')
@section('content')

<div class="wrapper">
    <div class="content-page">
        <div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                    <h4 class="page-title">Inventory</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('inventory.inventory-create') }}" class="btn btn-primary">
                            Create Inventory
                        </a>
        <div class="table-responsive">
        <table id="table" class="table table-hover dt-responsive nowrap w-100 tables">
            <thead>
                <tr>
                    <th>Booked Orders</th>
                    <th>Quantity</th>
                    <th>Product Code</th>
                    <th>Ingredient Quantity</th>
                    <th>Ending Inventory</th>
                    <th>KONJAC 32,000cps</th>
                    <th>KONJAC GUM 200 Mesh</th>
                    <th>KONJAC 10,000cps</th>
                    <th>KONJAC 36,000cps</th>
                    <th>AGAR</th>
                    <th>TARA GUM</th>
                    <th>LBG fg</th>
                    <th>GUAR GUM</th>
                    <th>NSG-20 (Hydrolyzed Guar Gum)</th>
                    <th>CASSIA - HGS</th>
                    <th>CASSIA GUM Food Grade</th>
                    <th>XANTHAN (200 Mesh)</th>
                    <th>XANTHAN (80 Mesh)</th>
                    <th>CMC-LV</th>
                    <th>CMC-HV</th>
                    <th>ICELITE #2</th>
                    <th>MC GEL</th>
                    <th>Non-Distilled Mono GMS 400V or PS200S</th>
                    <th>Distilled Mono DPV-1</th>
                    <th>SODIUM ALGINATE</th>
                    <th>SODIUM CITRATE</th>
                    <th>POTASSIUM CITRATE</th>
                    <th>CALCIUM LACTATE</th>
                    <th>CALCIUM ACETATE</th>
                    <th>CALCIUM SULFTAE</th>
                    <th>KCl</th>
                    <th>NaCl</th>
                    <th>MALTODEX</th>
                    <th>DEXTROSE</th>
                    <th>Refined Sugar w/ ACA</th>
                    <th>SILICON DIOXIDE</th>
                    <th>WHEAT GLUTEN</th>
                    <th>Gellan Gum HA </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventory as $item)
                    <tr>
                        <td>{{ $item->bookedOrder ? $item->bookedOrder->name : '' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->oitm ? $item->oitm->ItemName : ''}}</td>
                        <td>{{ number_format($item->ingredient_quantity, 2, '.', ',') }}</td>
                        <td>
                            @if($item->ending_inventoryDate)
                                {{ date('d/M/y', strtotime($item->ending_inventoryDate)) }}
                            @else
                                {{ $item->ending_inventoryChar }}
                            @endif
                        </td>                        
                        <td>{{ number_format($item->konjac32000cps_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->konjac_gum200mesh_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->konjac10000cps_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->konjac36000cps_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->agar_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->tara_gum_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->lbg_fg_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->guar_gum_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->nsg_20_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->cassia_hgs_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->cassia_gum_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->xanthan200mesh_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->xanthan80mesh_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->cmc_lv_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->cmc_hv_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->icelite2_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->mc_gel_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->non_distilled_mono_gms_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->distilled_mono_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->sodium_alginate_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->sodium_citrate_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->potassium_citrate_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->calcium_lactate_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->calcium_acetate_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->calcium_sulfate_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->kci_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->nacl_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->maltodex_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->dextrose_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->refinedsugar_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->silicon_dioxide_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->wheat_gluten_percent, 2, '.', ',') }}</td>
                        <td>{{ number_format($item->gellan_gum_percent, 2, '.', ',') }}</td>
                       

                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editInventoryModal{{ $item->id }}">Edit</button>
                            <form action="{{ route('inventory.destroy', $item) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="editInventoryModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editInventoryLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editInventoryLabel{{ $item->id }}">Edit Inventory</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('inventory.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="type">Booked Order</label>
                                            <select class="form-control" id="booked_order_id" name="booked_order_id">
                                                <option value="" selected disabled>Select Booked Order</option>
                                                @foreach($bookedOrders as $orderItem)
                                                    <option value="{{ $orderItem->id }}" {{ $item->booked_order_id == $orderItem->id ? 'selected' : '' }}>{{ $orderItem->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">Quantity KG</label>
                                            <input type="number" class="form-control quantity" id="quantity" name="quantity" value="{{ $item->quantity }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Product Code</label>
                                            <select class="form-control product-code" id="product_code" name="product_code">
                                                <option value="" selected disabled>Select Product Code</option>
                                                @foreach($oitmData as $productCode)
                                                    <option value="{{ $productCode->ItemCode }}" {{ $item->product_code == $productCode->ItemCode ? 'selected' : '' }}>{{ $productCode->ItemName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">Ingredient Quantity</label>
                                            <input type="number" class="form-control ingredient_quantity" id="ingredient_quantity" name="ingredient_quantity" value="{{ $item->ingredient_quantity }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">KONJAC 32,000cps</label>
                                            <input type="number" class="form-control konjac32000cps_percent" id="konjac32000cps_percent" name="konjac32000cps_percent" value="{{ $item->konjac32000cps_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">KONJAC GUM 200 mesh</label>
                                            <input type="number" class="form-control konjac_gum200mesh_percent" id="konjac_gum200mesh_percent" name="konjac_gum200mesh_percent" value="{{ $item->konjac_gum200mesh_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">KONJAC 10,000cps</label>
                                            <input type="number" class="form-control konjac10000cps_percent" id="konjac10000cps_percent" name="konjac10000cps_percent" value="{{ $item->konjac10000cps_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">KONJAC 36,000cps</label>
                                            <input type="number" class="form-control konjac36000cps_percent" id="konjac36000cps_percent" name="konjac36000cps_percent" value="{{ $item->konjac36000cps_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">AGAR</label>
                                            <input type="number" class="form-control agar_percent" id="agar_percent" name="agar_percent" value="{{ $item->agar_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">TARA GUM</label>
                                            <input type="number" class="form-control tara_gum_percent" id="tara_gum_percent" name="tara_gum_percent" value="{{ $item->tara_gum_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">LBG fg</label>
                                            <input type="number" class="form-control lbg_fg_percent" id="lbg_fg_percent" name="lbg_fg_percent" value="{{ $item->lbg_fg_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">GUAR GUM</label>
                                            <input type="number" class="form-control guar_gum_percent" id="guar_gum_percent" name="guar_gum_percent" value="{{ $item->guar_gum_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">NSG-20 (Hydrolyzed Guar Gum)</label>
                                            <input type="number" class="form-control nsg_20_percent" id="nsg_20_percent" name="nsg_20_percent" value="{{ $item->nsg_20_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">CASSIA - HGS</label>
                                            <input type="number" class="form-control cassia_hgs_percent" id="cassia_hgs_percent" name="cassia_hgs_percent" value="{{ $item->cassia_hgs_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">CASSIA GUM Food Grade</label>
                                            <input type="number" class="form-control cassia_gum_percent" id="cassia_gum_percent" name="cassia_gum_percent" value="{{ $item->cassia_gum_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">XANTHAN (200 Mesh)</label>
                                            <input type="number" class="form-control xanthan200mesh_percent" id="xanthan200mesh_percent" name="xanthan200mesh_percent" value="{{ $item->xanthan200mesh_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">XANTHAN (80 Mesh)</label>
                                            <input type="number" class="form-control xanthan80mesh_percent" id="xanthan80mesh_percent" name="xanthan80mesh_percent" value="{{ $item->xanthan80mesh_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">CMC-LV</label>
                                            <input type="number" class="form-control cmc_lv_percent" id="cmc_lv_percent" name="cmc_lv_percent" value="{{ $item->cmc_lv_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">CMC-HV</label>
                                            <input type="number" class="form-control cmc_hv_percent" id="cmc_hv_percent" name="cmc_hv_percent" value="{{ $item->cmc_hv_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">ICELITE #2</label>
                                            <input type="number" class="form-control icelite2_percent" id="icelite2_percent" name="icelite2_percent" value="{{ $item->icelite2_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">MC GEL</label>
                                            <input type="number" class="form-control mc_gel_percent" id="mc_gel_percent" name="mc_gel_percent" value="{{ $item->mc_gel_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">Non-Distilled Mono GMS 400V or PS200S</label>
                                            <input type="number" class="form-control non_distilled_mono_gms_percent" id="non_distilled_mono_gms_percent" name="non_distilled_mono_gms_percent" value="{{ $item->non_distilled_mono_gms_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">Distilled Mono DPV-1</label>
                                            <input type="number" class="form-control distilled_mono_percent" id="distilled_mono_percent" name="distilled_mono_percent" value="{{ $item->distilled_mono_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">SODIUM ALGINATE</label>
                                            <input type="number" class="form-control sodium_alginate_percent" id="sodium_alginate_percent" name="sodium_alginate_percent" value="{{ $item->sodium_alginate_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">SODIUM CITRATE</label>
                                            <input type="number" class="form-control sodium_citrate_percent" id="sodium_citrate_percent" name="sodium_citrate_percent" value="{{ $item->sodium_citrate_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">POTASSIUM CITRATE</label>
                                            <input type="number" class="form-control potassium_citrate_percent" id="potassium_citrate_percent" name="potassium_citrate_percent" value="{{ $item->potassium_citrate_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">CALCIUM LACTATE</label>
                                            <input type="number" class="form-control calcium_lactate_percent" id="calcium_lactate_percent" name="calcium_lactate_percent" value="{{ $item->calcium_lactate_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">CALCIUM ACETATE</label>
                                            <input type="number" class="form-control calcium_acetate_percent" id="calcium_acetate_percent" name="calcium_acetate_percent" value="{{ $item->calcium_acetate_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">CALCIUM SULFTAE</label>
                                            <input type="number" class="form-control calcium_sulfate_percent" id="calcium_sulfate_percent" name="calcium_sulfate_percent" value="{{ $item->calcium_sulfate_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">KCl</label>
                                            <input type="number" class="form-control kci_percent" id="kci_percent" name="kci_percent" value="{{ $item->kci_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">NaCl</label>
                                            <input type="number" class="form-control nacl_percent" id="nacl_percent" name="nacl_percent" value="{{ $item->nacl_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">MALTODEX</label>
                                            <input type="number" class="form-control maltodex_percent" id="maltodex_percent" name="maltodex_percent" value="{{ $item->maltodex_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">DEXTROSE</label>
                                            <input type="number" class="form-control dextrose_percent" id="dextrose_percent" name="dextrose_percent" value="{{ $item->dextrose_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">Refined Sugar w/ ACA</label>
                                            <input type="number" class="form-control refinedsugar_percent" id="refinedsugar_percent" name="refinedsugar_percent" value="{{ $item->refinedsugar_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">SILICON DIOXIDE</label>
                                            <input type="number" class="form-control silicon_dioxide_percent" id="silicon_dioxide_percent" name="silicon_dioxide_percent" value="{{ $item->silicon_dioxide_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">WHEAT GLUTEN</label>
                                            <input type="number" class="form-control wheat_gluten_percent" id="wheat_gluten_percent" name="wheat_gluten_percent" value="{{ $item->wheat_gluten_percent }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ingredient_quantity">Gellan Gum HA</label>
                                            <input type="number" class="form-control gellan_gum_percent" id="gellan_gum_percent" name="gellan_gum_percent" value="{{ $item->gellan_gum_percent }}" readonly>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

    </div>
</div>
</div>
</div>

<script>
     $(document).ready(function(){

    // $('.cat').chosen({width: "100%"});
    $('.tables').DataTable({
        pageLength: -1,
        fixedHeader: true,
        scrollX: true,
        scrollY: 700,   
        scrollCollapse: true,
        paging: false,
        paginate: false,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',

    });

    });

    $(document).ready(function () {
        $('.modal').on('shown.bs.modal', function () {
            $(this).find('select').select2({
                width: '100%',
                dropdownParent: $(this), 
            });
        });
    });
    
    $(document).ready(function() {
    var productPercentages = {!! $productPercentages !!};

    $(document).on('input', '.quantity', function() {
        var quantity = parseFloat($(this).val()) || 0;
        var productCode = $('.product-code').val(); 

        var percentageData = productPercentages.find(function(item) {
            return item.product_code == productCode;
        });
        
        if (percentageData) {
            var percentage = parseFloat(percentageData.quantity_percent) || 0;
            var konjac32000cpsPercent = parseFloat(percentageData.konjac32000cps) || 0;
            var konjac_gum200meshPercent = parseFloat(percentageData.konjac_gum200mesh) || 0;
            var konjac10000cpsPercent = parseFloat(percentageData.konjac10000cps) || 0;
            var konjac36000cpsPercent = parseFloat(percentageData.konjac36000cps) || 0;
            var agarPercent = parseFloat(percentageData.agar) || 0;
            var tara_gumPercent = parseFloat(percentageData.tara_gum) || 0;
            var lbg_fgPercent = parseFloat(percentageData.lbg_fg) || 0;
            var guar_gumPercent = parseFloat(percentageData.guar_gum) || 0;
            var nsg_20Percent = parseFloat(percentageData.nsg_20) || 0;
            var cassia_hgsPercent = parseFloat(percentageData.cassia_hgs) || 0;
            var cassia_gumPercent = parseFloat(percentageData.cassia_gum) || 0;
            var xanthan200meshPercent = parseFloat(percentageData.xanthan200mesh) || 0;
            var xanthan80meshPercent = parseFloat(percentageData.xanthan80mesh) || 0;
            var cmc_lvPercent = parseFloat(percentageData.cmc_lv) || 0;
            var cmc_hvPercent = parseFloat(percentageData.cmc_hv) || 0;
            var icelite2Percent = parseFloat(percentageData.icelite2) || 0;
            var mc_gelPercent = parseFloat(percentageData.mc_gel) || 0;
            var non_distilled_mono_gmsPercent = parseFloat(percentageData.non_distilled_mono_gms) || 0;
            var distilled_monoPercent = parseFloat(percentageData.distilled_mono) || 0;
            var sodium_alginatePercent = parseFloat(percentageData.sodium_alginate) || 0;
            var sodium_citratePercent = parseFloat(percentageData.sodium_citrate) || 0;
            var potassium_citratePercent = parseFloat(percentageData.potassium_citrate) || 0;
            var calcium_lactatePercent = parseFloat(percentageData.calcium_lactate) || 0;
            var calcium_acetatePercent = parseFloat(percentageData.calcium_acetate) || 0;
            var calcium_sulfatePercent = parseFloat(percentageData.calcium_sulfate) || 0;
            var kciPercent = parseFloat(percentageData.kci) || 0;
            var naclPercent = parseFloat(percentageData.nacl) || 0;
            var maltodexPercent = parseFloat(percentageData.maltodex) || 0;
            var dextrosePercent = parseFloat(percentageData.dextrose) || 0;
            var refinedsugarPercent = parseFloat(percentageData.refinedsugar) || 0;
            var silicon_dioxidePercent = parseFloat(percentageData.silicon_dioxide) || 0;
            var wheat_glutenPercent = parseFloat(percentageData.wheat_gluten) || 0;
            var gellan_gumPercent = parseFloat(percentageData.gellan_gum) || 0;

            var ingredientQuantity = (quantity * (percentage / 100)).toFixed(2);
            var konjac32000cps = (quantity * (konjac32000cpsPercent / 100)).toFixed(2);
            var konjac_gum200mesh = (quantity * (konjac_gum200meshPercent / 100)).toFixed(2);
            var konjac10000cps = (quantity * (konjac10000cpsPercent / 100)).toFixed(2);
            var konjac36000cps = (quantity * (konjac36000cpsPercent / 100)).toFixed(2);
            var agar = (quantity * (agarPercent / 100)).toFixed(2);
            var tara_gum = (quantity * (tara_gumPercent / 100)).toFixed(2);
            var lbg_fg = (quantity * (lbg_fgPercent / 100)).toFixed(2);
            var guar_gum = (quantity * (guar_gumPercent / 100)).toFixed(2);
            var nsg_20 = (quantity * (nsg_20Percent / 100)).toFixed(2);
            var cassia_hgs = (quantity * (cassia_hgsPercent / 100)).toFixed(2);
            var cassia_gum = (quantity * (cassia_gumPercent / 100)).toFixed(2);
            var xanthan200mesh = (quantity * (xanthan200meshPercent / 100)).toFixed(2);
            var xanthan80mesh = (quantity * (xanthan80meshPercent / 100)).toFixed(2);
            var cmc_lv = (quantity * (cmc_lvPercent / 100)).toFixed(2);
            var cmc_hv = (quantity * (cmc_hvPercent / 100)).toFixed(2);
            var icelite2 = (quantity * (icelite2Percent / 100)).toFixed(2);
            var mc_gel = (quantity * (mc_gelPercent / 100)).toFixed(2);
            var non_distilled_mono_gms = (quantity * (non_distilled_mono_gmsPercent / 100)).toFixed(2);
            var distilled_mono = (quantity * (distilled_monoPercent / 100)).toFixed(2);
            var sodium_alginate = (quantity * (sodium_alginatePercent / 100)).toFixed(2);
            var sodium_citrate = (quantity * (sodium_citratePercent / 100)).toFixed(2);
            var potassium_citrate = (quantity * (potassium_citratePercent / 100)).toFixed(2);
            var calcium_lactate = (quantity * (calcium_lactatePercent / 100)).toFixed(2);
            var calcium_acetate = (quantity * (calcium_acetatePercent / 100)).toFixed(2);
            var calcium_sulfate = (quantity * (calcium_sulfatePercent / 100)).toFixed(2);
            var kci = (quantity * (kciPercent / 100)).toFixed(2);
            var nacl = (quantity * (naclPercent / 100)).toFixed(2);
            var maltodex = (quantity * (maltodexPercent / 100)).toFixed(2);
            var dextrose = (quantity * (dextrosePercent / 100)).toFixed(2);
            var refinedsugar = (quantity * (refinedsugarPercent / 100)).toFixed(2);
            var silicon_dioxide = (quantity * (silicon_dioxidePercent / 100)).toFixed(2);
            var wheat_gluten = (quantity * (wheat_glutenPercent / 100)).toFixed(2);
            var gellan_gum = (quantity * (gellan_gumPercent / 100)).toFixed(2);
            
            $(this).closest('.modal-body').find('.ingredient_quantity').val(ingredientQuantity); 
            $(this).closest('.modal-body').find('.konjac32000cps_percent').val(konjac32000cps);
            $(this).closest('.modal-body').find('.konjac_gum200mesh_percent').val(konjac_gum200mesh);
            $(this).closest('.modal-body').find('.konjac10000cps_percent').val(konjac10000cps);
            $(this).closest('.modal-body').find('.konjac36000cps_percent').val(konjac36000cps);
            $(this).closest('.modal-body').find('.agar_percent').val(agar);
            $(this).closest('.modal-body').find('.tara_gum_percent').val(tara_gum);
            $(this).closest('.modal-body').find('.lbg_fg_percent').val(lbg_fg);
            $(this).closest('.modal-body').find('.guar_gum_percent').val(guar_gum);
            $(this).closest('.modal-body').find('.nsg_20_percent').val(nsg_20);
            $(this).closest('.modal-body').find('.cassia_hgs_percent').val(cassia_hgs);
            $(this).closest('.modal-body').find('.cassia_gum_percent').val(cassia_gum);
            $(this).closest('.modal-body').find('.xanthan200mesh_percent').val(xanthan200mesh);
            $(this).closest('.modal-body').find('.xanthan80mesh_percent').val(xanthan80mesh);
            $(this).closest('.modal-body').find('.cmc_lv_percent').val(cmc_lv);
            $(this).closest('.modal-body').find('.cmc_hv_percent').val(cmc_hv);
            $(this).closest('.modal-body').find('.icelite2_percent').val(icelite2);
            $(this).closest('.modal-body').find('.mc_gel_percent').val(mc_gel);
            $(this).closest('.modal-body').find('.non_distilled_mono_gms_percent').val(non_distilled_mono_gms);
            $(this).closest('.modal-body').find('.distilled_mono_percent').val(distilled_mono);
            $(this).closest('.modal-body').find('.sodium_alginate_percent').val(sodium_alginate);
            $(this).closest('.modal-body').find('.sodium_citrate_percent').val(sodium_citrate);
            $(this).closest('.modal-body').find('.potassium_citrate_percent').val(potassium_citrate);
            $(this).closest('.modal-body').find('.calcium_lactate_percent').val(calcium_lactate);
            $(this).closest('.modal-body').find('.calcium_acetate_percent').val(calcium_acetate);
            $(this).closest('.modal-body').find('.calcium_sulfate_percent').val(calcium_sulfate);
            $(this).closest('.modal-body').find('.kci_percent').val(kci);
            $(this).closest('.modal-body').find('.nacl_percent').val(nacl);
            $(this).closest('.modal-body').find('.maltodex_percent').val(maltodex);
            $(this).closest('.modal-body').find('.dextrose_percent').val(dextrose);
            $(this).closest('.modal-body').find('.refinedsugar_percent').val(refinedsugar);
            $(this).closest('.modal-body').find('.silicon_dioxide_percent').val(silicon_dioxide);
            $(this).closest('.modal-body').find('.wheat_gluten_percent').val(wheat_gluten);
            $(this).closest('.modal-body').find('.gellan_gum_percent').val(gellan_gum);
        }
    });
});

</script>
@endsection
