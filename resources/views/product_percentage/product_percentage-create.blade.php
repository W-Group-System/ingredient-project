@extends('layouts.app')
@section('content')
<style>
    .card-body .form-control{
        width: 100px !important;
    }
</style>
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
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            <div class="card-body">
                                <form action="{{ route('product_percentages.store') }}" method="POST" id="inventoryForm">
                                    @csrf
                                    <div class="table-responsive">
                                    <table class="table" id="inventoryTable">
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Ingredient Quantity Percentage</th>
                                            <th>KONJAK 32,000cps Percentage</th>
                                            <th>KONJAC GUM 200 mesh Percentage</th>
                                            <th>KONJAC 10,000cps Percentage</th>
                                            <th>KONJAC 36,000cps Percentage</th>
                                            <th>AGAR Percentage</th>
                                            <th>TARA GUM Percentage</th>
                                            <th>LBG fg Percentage</th>
                                            <th>GUAR GUM Percentage</th>
                                            <th>NSG-20 Percentage</th>
                                            <th>CASSIA-HGS Percentage</th>
                                            <th>CASSIA GUM Food Grade Percentage</th>
                                            <th>XANTHAN 200 Mesh Percentage</th>
                                            <th>XANTHAN 80 Mesh Percentage</th>
                                            <th>CMC-LV Percentage</th>
                                            <th>CMC-HV Percentage</th>
                                            <th>ICELITE #2 Percentage</th>
                                            <th>MC GEL Percentage</th>
                                            <th>Non-Distilled Mono GMS Percentage</th>
                                            <th>Distilled Mono DPV-1 Percentage</th>
                                            <th>SODIUM ALGINATE Percentage</th>
                                            <th>SODIUM CITRATE Percentage</th>
                                            <th>POTASSIUM CITRATE Percentage</th>
                                            <th>CALCIUM LACTATE Percentage</th>
                                            <th>CALCIUM ACETATE Percentage</th>
                                            <th>CALCIUM SULFATE Percentage</th>
                                            <th>KCI Percentage</th>
                                            <th>NaCl Percentage</th>
                                            <th>MALTODEX Percentage</th>
                                            <th>DEXTROSE Percentage</th>
                                            <th>Refined Sugar w/ ACA Percentage</th>
                                            <th>SILICONE DIOXIDE</th>
                                            <th>WHEAT GLUTEN</th>
                                            <th>Gellan Gum HA</th>
                                        </tr>
                                        <tr class="create_percentage_form">
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
                                                    <input type="number" class="form-control quantity" name="quantity_percent[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="konjac32000cps[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="konjac_gum200mesh[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="konjac10000cps[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="konjac36000cps[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="agar[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="tara_gum[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="lbg_fg[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="guar_gum[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="nsg_20[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="cassia_hgs[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="cassia_gum[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="xanthan200mesh[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="xanthan80mesh[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="cmc_lv[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="cmc_hv[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="icelite2[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="mc_gel[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="non_distilled_mono_gms[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="distilled_mono[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="sodium_alginate[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="sodium_citrate[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="potassium_citrate[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="calcium_lactate[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="calcium_acetate[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="calcium_sulfate[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="kci[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="nacl[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="maltodex[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="dextrose[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="refinedsugar[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="silicon_dioxide[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="wheat_gluten[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control quantity" name="gellan_gum[]">
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger remove-row">Remove</button>
                                            </td>
                                        </tr>
                                    </table>
                                    </div>
                                    <button type="button" class="btn btn-primary addRow" id="addRow">Add Row</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
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
    // Initial select2 setup
    $('select').select2();

    // Function to initialize select2 on a single row
    function initializeSelect2OnRow(row) {
        row.find('select').select2();
    }

    $('#addRow').click(function() {
        var newRow = $('.create_percentage_form').first().clone();

        newRow.find('input').val('');

        newRow.find('select')
            .removeClass('select2-hidden-accessible')
            .next('.select2-container')
            .remove();

        $('#inventoryTable').append(newRow); // Insert inside the table

        newRow.find('.remove-row').removeAttr('hidden');

        // Initialize select2 on the newly added row
        initializeSelect2OnRow(newRow);

        newRow.find('.remove-row').click(function() {
            $(this).closest('tr').remove();
        });
    });
});


</script>
@endsection
