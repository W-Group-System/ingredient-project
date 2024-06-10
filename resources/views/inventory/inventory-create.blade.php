@extends('layouts.app')
@section('content')
<style>
    .card-body .form-control{
        width: 300px !important;
    }
    .card-body .tab-content #home1 .form-control{
        width: 100% !important;
    }
    .steps {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.steps ul {
    margin-top: 1rem;
}
.steps li {
    display: inline-block;
    margin-right: 10px;
}

.steps li a {
    display: block;
    padding: 10px 15px;
    background-color: #f0f0f0; /* Background color of the tabs */
    color: #333; /* Text color of the tabs */
    text-decoration: none;
    border-radius: 5px;
}

.steps li.active a {
    background-color: #007bff; /* Background color of the active tab */
    color: #fff; /* Text color of the active tab */
}
</style>
<div class="wrapper">
    <div class="content-page">
        <div class="content">
            <div id="loader" class="spinner-border avatar-lg text-primary" role="status" style="display: none;"></div>
            <div id="overlay"></div>
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
                <div class="card">
                <div class="wizard" id="wizard">
                    <div class="steps clearfix">
                        <ul role="tablist">
                            <li role="tab" class="step first active" aria-selected="true"><a href="#step1" data-toggle="tab">Orders</a></li>
                            <li role="tab" class="step done" aria-selected="false"><a href="#step2" data-toggle="tab">Incoming</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="step1">
                <div class="row">
                    <div class="col-lg-12">
                            <ul class="nav nav-tabs mb-3" id="entryTabs">
                                <button id="addEntryTab" class="btn btn-primary">Add Entry Tab</button>
                                <li class="nav-item entryNumber">
                                    <a href="#entry1" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">ENTRY 1</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="entryTabsContent">
                                <div class="tab-pane active" id="entry1">
                            <div class="card-body">
                                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                    <li class="nav-item">
                                        <a href="#home1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                            <span class="d-none d-md-block">Ingredients</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#settings1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                            <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                            <span class="d-none d-md-block">Orders</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home1">
                                        <form action="{{ route('inventory.ingredientStore') }}" method="POST" id="ingredientForm">
                                            @csrf
                                            <div class="table-responsive">
                                            <table class="table" id="ingredientTable1">
                                                <tr>
                                                    <th>Ingredient</th>
                                                    <th>Inventory (KG)</th>
                                                    <th>Group ID</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr class="ingredient_form">
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control ingredient" name="ingredient[]">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control inventoryPerkg" name="inventoryPerkg[]">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control groupid" name="groupid[]">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger remove-ingredientTable-row">Remove</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                            <button type="button" class="btn btn-primary" id="addRowIngredientTable1">Add Row</button>
                                            {{-- <button type="submit" class="btn btn-primary">Create</button> --}}
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="settings1">
                                        <form action="{{ route('inventory.store') }}" method="POST" id="inventoryForm">
                                            @csrf
                                            <div class="table-responsive">
                                            <table class="table" id="inventoryTable1">
                                                <tr>
                                                    <th>Booked Order</th>
                                                    <th>Product Code</th>
                                                    <th>Quantity KG</th>
                                                    <th>Ingredient Quantity</th>
                                                    <th>Group Id</th>
                                                    <th>Ending Inventory (Date)</th>
                                                    <th>Ending Inventory (To Be Confirmed)</th>
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
                                                    <th>Action</th>
                                                </tr>
                                                <tr class="inventory_form">
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control booked-order" name="booked_order_id[]" required>
                                                                <option value="" selected disabled>Select Booked Order</option>
                                                                @foreach($bookedOrders as $orderItem)
                                                                    <option value="{{ $orderItem->id }}">{{ $orderItem->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control product-code" name="product_code[]" required>
                                                                <option value="" selected disabled>Select Product Code</option>
                                                                @foreach($oitmData as $productCode)
                                                                    <option value="{{ $productCode->ItemCode }}">{{ $productCode->ItemName }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control quantity" name="quantity[]" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control ingredient_quantity" name="ingredient_quantity[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control groupid" name="groupid[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="date" class="form-control ending_inventoryDate" name="ending_inventoryDate[]">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control ending_inventoryChar" name="ending_inventoryChar[]" placeholder="Input here for TBC Orders">
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="form-group">
                                                            <label for="inventory_entry">Inventory Entry:</label>
                                                            <div class="input-group">
                                                                <input type="date" id="inventory_date" name="inventory_date" class="form-control">
                                                                <input type="text" id="special_message" name="special_message" class="form-control" placeholder="Enter TBC">
                                                            </div>
                                                        </div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control konjac32000cps_percent" name="konjac32000cps_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control konjac_gum200mesh_percent" name="konjac_gum200mesh_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control konjac10000cps_percent" name="konjac10000cps_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control konjac36000cps_percent" name="konjac36000cps_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control agar_percent" name="agar_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control tara_gum_percent" name="tara_gum_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control lbg_fg_percent" name="lbg_fg_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control guar_gum_percent" name="guar_gum_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control nsg_20_percent" name="nsg_20_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control cassia_hgs_percent" name="cassia_hgs_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control cassia_gum_percent" name="cassia_gum_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control xanthan200mesh_percent" name="xanthan200mesh_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control xanthan80mesh_percent" name="xanthan80mesh_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control cmc_lv_percent" name="cmc_lv_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control cmc_hv_percent" name="cmc_hv_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control icelite2_percent" name="icelite2_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control mc_gel_percent" name="mc_gel_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control non_distilled_mono_gms_percent" name="non_distilled_mono_gms_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control distilled_mono_percent" name="distilled_mono_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control sodium_alginate_percent" name="sodium_alginate_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control sodium_citrate_percent" name="sodium_citrate_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control potassium_citrate_percent" name="potassium_citrate_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control calcium_lactate_percent" name="calcium_lactate_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control calcium_acetate_percent" name="calcium_acetate_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control calcium_sulfate_percent" name="calcium_sulfate_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control kci_percent" name="kci_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control nacl_percent" name="nacl_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control maltodex_percent" name="maltodex_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control dextrose_percent" name="dextrose_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control refinedsugar_percent" name="refinedsugar_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control silicon_dioxide_percent" name="silicon_dioxide_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control wheat_gluten_percent" name="wheat_gluten_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control gellan_gum_percent" name="gellan_gum_percent[]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                            <button type="button" class="btn btn-primary" id="addRow1">Add Row</button>
                                            {{-- <button type="submit" class="btn btn-primary">Create</button> --}}
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                        </div>
                    </div>
                    <button onclick="nextStep()">Next</button>
                </div>
                <div class="tab-pane" id="step2">
                    <!-- Step 3 Content -->
                    <div class="row">
                        <div class="card-body">
                            <form action="{{ route('inventory.incomingIngredientStore') }}" method="POST" id="incomingIngredientForm">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table" id="incomingIngredientTable">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>PR No.</th>
                                            <th>PO No.</th>
                                            <th>Qty</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($productname as $product)
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control product-name" value="{{ $product->product_name }}" readonly>
                                                    <input type="hidden" name="product_name_id[]" value="{{ $product->id }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control pr_no" name="pr_no[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control po-no" name="po_no[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control qty" name="qty[]">
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success add-row">Add Row</button>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control incominggroupId" name="incominggroupId[]" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>                                
                                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                            </form>                            
                    </div>
                </div>
                    <button class="btn btn-primary" onclick="previousStep()">Previous</button>
                    <button type="button" class="btn btn-primary" id="submitForms">Create</button>
                </div>
                </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('select').select2();

            var groupid = 'group_' + Math.random().toString(36).substr(2, 9);
            $('#ingredientTable1 .groupid').val(groupid);
            $('#inventoryTable1 .groupid').val(groupid);

            
            var incominggroupid = 'group_' + Math.random().toString(36).substr(2, 9);
            $('#incomingIngredientTable .incominggroupId').val(incominggroupid);
        $(document).ready(function() {
            
});

$('#addRowIngredientTable1').click(function() {
    var newRow = $('.ingredient_form').first().clone();

    newRow.find('input').val('');

    newRow.find('select')
        .removeClass('select2-hidden-accessible')
        .next('.select2-container')
        .remove();
        $('#ingredientTable1').find('.booked-order').last().select2();
        $('#ingredientTable1').find('.product-code').last().select2();


    newRow.find('.groupid').val(groupid);

    $('#ingredientTable1').append(newRow);
    
    newRow.find('.remove-ingredientTable-row').removeAttr('hidden');

    newRow.find('.remove-ingredientTable-row').click(function() {
        $(this).closest('tr').remove();
    });
});


$('#addRow1').click(function() {
    var newRow = $('.inventory_form').first().clone();

    newRow.find('input').val('');

    newRow.find('select')
        .removeClass('select2-hidden-accessible')
        .next('.select2-container')
        .remove();
        $('#inventoryTable1').find('.booked-order').last().select2();
        $('#inventoryTable1').find('.product-code').last().select2();


    newRow.find('.groupid').val(groupid);

    $('#inventoryTable1').append(newRow);
    
    newRow.find('.remove-row').removeAttr('hidden');

    initializeSelect2OnRow(newRow);

    newRow.find('.remove-row').click(function() {
        $(this).closest('tr').remove();
    });
});

function initializeSelect2OnRow(row) {
    // row.find('.booked-order').select2();
    // row.find('.product-code').select2();
    $('#inventoryTable1').find('.booked-order').last().select2();
    $('#inventoryTable1').find('.product-code').last().select2();
}


        $(document).ready(function() {
    var productPercentages = {!! $productPercentages !!};

    $(document).on('input', '.quantity', function() {
        var $row = $(this).closest('tr');
        var quantity = parseFloat($row.find('.quantity').val()) || 0;
        var productCode = $row.find('.product-code').val();

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

            $row.find('.ingredient_quantity').val(ingredientQuantity);
            $row.find('.konjac32000cps_percent').val(konjac32000cps);
            $row.find('.konjac_gum200mesh_percent').val(konjac_gum200mesh);
            $row.find('.konjac10000cps_percent').val(konjac10000cps);
            $row.find('.konjac36000cps_percent').val(konjac36000cps);
            $row.find('.agar_percent').val(agar);
            $row.find('.tara_gum_percent').val(tara_gum);
            $row.find('.lbg_fg_percent').val(lbg_fg);
            $row.find('.guar_gum_percent').val(guar_gum);
            $row.find('.nsg_20_percent').val(nsg_20);
            $row.find('.cassia_hgs_percent').val(cassia_hgs);
            $row.find('.cassia_gum_percent').val(cassia_gum);
            $row.find('.xanthan200mesh_percent').val(xanthan200mesh);
            $row.find('.xanthan80mesh_percent').val(xanthan80mesh);
            $row.find('.cmc_lv_percent').val(cmc_lv);
            $row.find('.cmc_hv_percent').val(cmc_hv);
            $row.find('.icelite2_percent').val(icelite2);
            $row.find('.mc_gel_percent').val(mc_gel);
            $row.find('.non_distilled_mono_gms_percent').val(non_distilled_mono_gms);
            $row.find('.distilled_mono_percent').val(distilled_mono);
            $row.find('.sodium_alginate_percent').val(sodium_alginate);
            $row.find('.sodium_citrate_percent').val(sodium_citrate);
            $row.find('.potassium_citrate_percent').val(potassium_citrate);
            $row.find('.calcium_lactate_percent').val(calcium_lactate);
            $row.find('.calcium_acetate_percent').val(calcium_acetate);
            $row.find('.calcium_sulfate_percent').val(calcium_sulfate);
            $row.find('.kci_percent').val(kci);
            $row.find('.nacl_percent').val(nacl);
            $row.find('.maltodex_percent').val(maltodex);
            $row.find('.dextrose_percent').val(dextrose);
            $row.find('.refinedsugar_percent').val(refinedsugar);
            $row.find('.silicon_dioxide_percent').val(silicon_dioxide);
            $row.find('.wheat_gluten_percent').val(wheat_gluten);
            $row.find('.gellan_gum_percent').val(gellan_gum);
            

        }
    });
});

$("#addEntryTab").click(function() {
    var tabNumber = $('.nav-item.entryNumber').length + 1;
    var groupId = generateGroupId();

    var newTabLink = `<li class="nav-item entryNumber"> 
        <a href="#entry${tabNumber}" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
            <i class="mdi mdi-home-variant d-md-none d-block"></i>
            <span class="d-none d-md-block">ENTRY ${tabNumber}</span>
        </a>
    </li>`;
    $('#entryTabs').append(newTabLink);

    // Create the new tab content with Home and Settings sections
    var newTabPane = `<div class="tab-pane" id="entry${tabNumber}">
        <div class="card-body">
            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                <li class="nav-item">
                    <a href="#home${tabNumber}" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                        <span class="d-none d-md-block">Ingredients</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings${tabNumber}" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                        <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                        <span class="d-none d-md-block">Orders</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home${tabNumber}">
                    <form action="{{ route('inventory.store') }}" method="POST" id="ingredientForm${tabNumber}">
                        @csrf
                        <div class="table-responsive">
                            <table class="table" id="ingredientTable${tabNumber}">
                                <tr>
                                    <th>Ingredient</th>
                                    <th>Inventory (KG)</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control ingredient" name="ingredient[]">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control inventoryPerkg" name="inventoryPerkg[]">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control groupid" value="${groupId}" name="groupid[]" >
                                                        </div>
                                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger remove-ingredientTable-row">Remove</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <button type="button" class="btn btn-primary" id="addRowIngredientTable${tabNumber}">Add Row</button>
                        
                    </form>
                </div>
                <div class="tab-pane" id="settings${tabNumber}">
                    <form action="{{ route('inventory.store') }}" method="POST" id="inventoryForm${tabNumber}">
                        @csrf
                        <div class="table-responsive">
                            <table class="table" id="inventoryTable${tabNumber}">
                                <tr>
                                    <th>Booked Order</th>
                                                    <th>Product Code</th>
                                                    <th>Quantity KG</th>
                                                    <th>Ingredient Quantity</th>
                                                    <th>Group Id</th>
                                                    <th>Ending Inventory (Date)</th>
                                                    <th>Ending Inventory (To Be Confirmed)</th>
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
                                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>
        <div class="form-group">
            <select class="form-control booked-order" name="booked_order_id[]">
                <option value="" selected disabled>Select Booked Order</option>
                @foreach($bookedOrders as $orderItem)
                <option value="{{ $orderItem->id }}">{{ $orderItem->name }}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div class="form-group">
            <select class="form-control product-code" name="product_code[]">
            <option value="" selected disabled>Select Product Code</option>
            @foreach($oitmData as $productCode)
            <option value="{{ $productCode->ItemCode }}">{{ $productCode->ItemName }}</option>
            @endforeach
            </select>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control quantity" name="quantity[]" required>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control ingredient_quantity" name="ingredient_quantity[]" readonly>
         </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" class="form-control groupid" name="groupid[]" value="` + groupId + `" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="date" class="form-control ending_inventoryDate" name="ending_inventoryDate[]">
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" class="form-control ending_inventoryChar" name="ending_inventoryChar[]" placeholder="Input here for TBC Orders">
        </div>
    </td>
    <td>
         <div class="form-group">
            <input type="number" class="form-control konjac32000cps_percent" name="konjac32000cps_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control konjac_gum200mesh_percent" name="konjac_gum200mesh_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control konjac10000cps_percent" name="konjac10000cps_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control konjac36000cps_percent" name="konjac36000cps_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control agar_percent" name="agar_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control tara_gum_percent" name="tara_gum_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control lbg_fg_percent" name="lbg_fg_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control guar_gum_percent" name="guar_gum_percent[]" readonly>
        </div>
    </td>
    <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control nsg_20_percent" name="nsg_20_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control cassia_hgs_percent" name="cassia_hgs_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control cassia_gum_percent" name="cassia_gum_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control xanthan200mesh_percent" name="xanthan200mesh_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control xanthan80mesh_percent" name="xanthan80mesh_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control cmc_lv_percent" name="cmc_lv_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control cmc_hv_percent" name="cmc_hv_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control icelite2_percent" name="icelite2_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control mc_gel_percent" name="mc_gel_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control non_distilled_mono_gms_percent" name="non_distilled_mono_gms_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control distilled_mono_percent" name="distilled_mono_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control sodium_alginate_percent" name="sodium_alginate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control sodium_citrate_percent" name="sodium_citrate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control potassium_citrate_percent" name="potassium_citrate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control calcium_lactate_percent" name="calcium_lactate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control calcium_acetate_percent" name="calcium_acetate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control calcium_sulfate_percent" name="calcium_sulfate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control kci_percent" name="kci_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control nacl_percent" name="nacl_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control maltodex_percent" name="maltodex_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control dextrose_percent" name="dextrose_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control refinedsugar_percent" name="refinedsugar_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control silicon_dioxide_percent" name="silicon_dioxide_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control wheat_gluten_percent" name="wheat_gluten_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control gellan_gum_percent" name="gellan_gum_percent[]" readonly>
                                                </div>
                                            </td>
                                            
                                </tr>
                            </table>
                        </div>
                        <button type="button" class="btn btn-primary" id="addRowInventoryTable${tabNumber}">Add Row</button>

                    </form>
                </div>
            </div>
        </div>
    </div>`;
    $('#entryTabsContent').append(newTabPane);

    $(`#addRowIngredientTable${tabNumber}`).click(function() {
        var newRow = `<tr>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control ingredient" name="ingredient[]">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="number" class="form-control inventoryPerkg" name="inventoryPerkg[]">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control groupid" value="${groupId}" name="groupid[]" >
                </div>
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-ingredientTable-row">Remove</button>
            </td>
        </tr>`;
        $(`#ingredientTable${tabNumber}`).append(newRow);
    });

    $(`#addRowInventoryTable${tabNumber}`).click(function() {
        var newRow = `<tr>
            <td>
        <div class="form-group">
            <select class="form-control booked-order" name="booked_order_id[]">
                <option value="" selected disabled>Select Booked Order</option>
                @foreach($bookedOrders as $orderItem)
                <option value="{{ $orderItem->id }}">{{ $orderItem->name }}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div class="form-group">
            <select class="form-control product-code" name="product_code[]">
            <option value="" selected disabled>Select Product Code</option>
            @foreach($oitmData as $productCode)
            <option value="{{ $productCode->ItemCode }}">{{ $productCode->ItemName }}</option>
            @endforeach
            </select>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control quantity" name="quantity[]" required>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control ingredient_quantity" name="ingredient_quantity[]" readonly>
         </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" class="form-control groupid" name="groupid[]" value="` + groupId + `" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="date" class="form-control ending_inventoryDate" name="ending_inventoryDate[]">
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="text" class="form-control ending_inventoryChar" name="ending_inventoryChar[]" placeholder="Input here for TBC Orders">
        </div>
    </td>
    <td>
         <div class="form-group">
            <input type="number" class="form-control konjac32000cps_percent" name="konjac32000cps_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control konjac_gum200mesh_percent" name="konjac_gum200mesh_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control konjac10000cps_percent" name="konjac10000cps_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control konjac36000cps_percent" name="konjac36000cps_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control agar_percent" name="agar_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control tara_gum_percent" name="tara_gum_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control lbg_fg_percent" name="lbg_fg_percent[]" readonly>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control guar_gum_percent" name="guar_gum_percent[]" readonly>
        </div>
    </td>
    <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control nsg_20_percent" name="nsg_20_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control cassia_hgs_percent" name="cassia_hgs_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control cassia_gum_percent" name="cassia_gum_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control xanthan200mesh_percent" name="xanthan200mesh_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control xanthan80mesh_percent" name="xanthan80mesh_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control cmc_lv_percent" name="cmc_lv_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control cmc_hv_percent" name="cmc_hv_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control icelite2_percent" name="icelite2_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control mc_gel_percent" name="mc_gel_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control non_distilled_mono_gms_percent" name="non_distilled_mono_gms_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control distilled_mono_percent" name="distilled_mono_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control sodium_alginate_percent" name="sodium_alginate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control sodium_citrate_percent" name="sodium_citrate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control potassium_citrate_percent" name="potassium_citrate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control calcium_lactate_percent" name="calcium_lactate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control calcium_acetate_percent" name="calcium_acetate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control calcium_sulfate_percent" name="calcium_sulfate_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control kci_percent" name="kci_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control nacl_percent" name="nacl_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control maltodex_percent" name="maltodex_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control dextrose_percent" name="dextrose_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control refinedsugar_percent" name="refinedsugar_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control silicon_dioxide_percent" name="silicon_dioxide_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control wheat_gluten_percent" name="wheat_gluten_percent[]" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control gellan_gum_percent" name="gellan_gum_percent[]" readonly>
                                                </div>
                                            </td>
        </tr>`;
        $(`#inventoryTable${tabNumber}`).append(newRow);
    });

    $(document).on('click', '.remove-ingredientTable-row', function() {
        $(this).closest('tr').remove();
    });
    $('<style>')
        .text(`#entry${tabNumber} .form-control { width: 300px !important; }`)
        .appendTo('head');
    $('<style>')
        .text(`#entry${tabNumber} #home${tabNumber} .form-control { width: 100% !important; }`)
        .appendTo('head');
});


    });

    function generateGroupId() {
    return 'group_' + Math.random().toString(36).substr(2, 9);
}


$("#submitForms").click(function() {
    // Show loader when the button is clicked
    showLoader();
    submitAllIngredientForms().then(function() {
        submitAllInventoryForms().then(function() {
            submitIncomingIngredientForm().then(function() {
            // Hide loader after all forms are submitted
            hideLoader();
            // Redirect to the inventory route after all forms are submitted
            window.location.href = "{{ route('inventory.inventory') }}";
        });
        });
    });
});

function showLoader() {
    // Show loader and overlay
    $("#loader").show();
    $("#overlay").show();
}

function hideLoader() {
    // Hide loader and overlay
    $("#loader").hide();
    $("#overlay").hide();
}


function submitAllIngredientForms() {
    // Create a deferred object
    var deferred = $.Deferred();
    var forms = $("form[id^='ingredientForm']");
    var formIndex = 0;

    // Define a function to submit each form sequentially
    function submitNextForm() {
        if (formIndex < forms.length) {
            var form = $(forms[formIndex]);
            var formData = form.serialize();
            
            $.ajax({
                url: "{{ route('inventory.ingredientStore') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    console.log(form.attr('id') + " submitted successfully");
                    formIndex++;
                    // Recursively call submitNextForm to submit the next form
                    submitNextForm();
                },
                error: function(xhr, status, error) {
                    console.error("Error submitting " + form.attr('id') + ":", error);
                    // Reject the promise if an error occurs
                    deferred.reject();
                }
            });
        } else {
            // Resolve the promise when all forms are submitted
            deferred.resolve();
        }
    }

    // Start submitting forms sequentially
    submitNextForm();

    // Return the promise
    return deferred.promise();
}

function submitIncomingIngredientForm() {
    var deferred = $.Deferred();
    var form = $("#incomingIngredientForm"); 
    // var formData = form.serialize();

    $.ajax({
        url: "{{ route('inventory.incomingIngredientStore') }}",
        type: "POST",
        data: form.serialize(),
        success: function(response) {
            console.log(form.attr('id') + " submitted successfully");
            deferred.resolve();
        },
        error: function(xhr, status, error) {
            console.error("Error submitting " + form.attr('id') + ":", error);
            deferred.reject();
        }
    });

    // Return the promise
    return deferred.promise();
}


function submitAllInventoryForms() {
    // Create a deferred object
    var deferred = $.Deferred();
    var forms = $("form[id^='inventoryForm']");
    var formIndex = 0;

    // Define a function to submit each form sequentially
    function submitNextForm() {
        if (formIndex < forms.length) {
            var form = $(forms[formIndex]);
            var formData = form.serialize();

            $.ajax({
                url: "{{ route('inventory.store') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    console.log(form.attr('id') + " submitted successfully");
                    formIndex++;
                    // Recursively call submitNextForm to submit the next form
                    submitNextForm();
                },
                error: function(xhr, status, error) {
                    console.error("Error submitting " + form.attr('id') + ":", error);
                    // Reject the promise if an error occurs
                    deferred.reject();
                }
            });
        } else {
            // Resolve the promise when all forms are submitted
            deferred.resolve();
        }
    }

    // Start submitting forms sequentially
    submitNextForm();

    // Return the promise
    return deferred.promise();
}

function nextStep() {
        var currentStep = $(".wizard .steps .step.active");
        var nextStep = currentStep.next(".step");

        // Check if there is a next step
        if (nextStep.length > 0) {
            currentStep.removeClass("active").addClass("done");
            nextStep.addClass("active").attr("aria-selected", "true");
            
            var currentTab = currentStep.find("a").attr("href");
            var nextTab = nextStep.find("a").attr("href");
            $(currentTab).removeClass("active");
            $(nextTab).addClass("active");
        }
    }

    function previousStep() {
        var currentStep = $(".wizard .steps .step.active");
        var prevStep = currentStep.prev(".step");

        // Check if there is a previous step
        if (prevStep.length > 0) {
            currentStep.removeClass("active");
            prevStep.removeClass("done").addClass("active").attr("aria-selected", "true");
            
            var currentTab = currentStep.find("a").attr("href");
            var prevTab = prevStep.find("a").attr("href");
            $(currentTab).removeClass("active");
            $(prevTab).addClass("active");
        }
    }

    function submitForms() {
        // Here you can write your JavaScript code to submit forms
        // For example, you can trigger form submission for each step:
        $("#step1 form").submit();
        $("#step2 form").submit();
        $("#step3 form").submit();
    }
</script>
@endsection
