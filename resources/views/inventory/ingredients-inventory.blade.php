@extends('layouts.app')
@section('content')
<style>
    #total_inventory td{
      border: 1px solid black;
    }
    #ingregients-row td{
      /* border: 1px black; */
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
                    <div class="card-body">
                        <a href="{{ route('inventory.inventory-create') }}" class="btn btn-primary">
                            Create Inventory
                        </a>
        <div class="table-responsive">
            <table  class="table table-bordered table-hover dt-responsive nowrap w-100 tables">
                <tr>
                    <th>Ingredient</th>
                    <th>Inventory (KG)</th>
                    <th>Booked Orders</th>
                    <th>Qty (KG)</th>
                    <th>Product Code</th>
                    <th>Ingredient Qty KG</th>
                    <th>Loading Date</th>
                    
                    <th>KONJAC 32,000cps</th>
                    <th>KONJAC GUM 200 mesh</th>
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

                </tr>
                @php
                    $totalKonjac32000cps = 0;
                    $totalKonjac_gum200mesh = 0; 
                    $totalKonjac10000cps = 0; 
                    $totalKonjac36000cps = 0; 
                    $totalAgar = 0; 
                    $totalTara_gum = 0; 
                    $totalLbg_fg = 0; 
                    $totalGuar_gum = 0; 
                    $totalNsg_20 = 0; 
                    $totalCassia_hgs = 0; 
                    $totalCassia_gum = 0; 
                    $totalXanthan200mesh = 0; 
                    $totalXanthan80mesh = 0; 
                    $totalCmc_lv_percent = 0; 
                    $totalCmc_hv_percent = 0; 
                    $totalIcelite2 = 0; 

                    $totalMc_gel = 0; 
                    $totalNon_distilled_mono_gms = 0; 
                    $totalDistilled_mono = 0; 
                    $totalSodium_alginate = 0; 
                    $totalSodium_citrate = 0; 
                    $totalPotassium_citrate = 0; 
                    $totalCalcium_lactate = 0; 
                    $totalCalcium_acetate = 0; 
                    $totalCalcium_sulfate = 0; 
                    $totalKci = 0; 
                    $totalNacl = 0; 
                    $totalMaltodex = 0; 
                    $totalDextrose = 0; 
                    $totalRefinedsugar = 0; 
                    $totalSilicon_dioxide = 0; 
                    $totalWheat_gluten = 0; 
                    $totalGellan_gum = 0; 
                @endphp
                @foreach($ingredientGroups as $group)
                @php
                    $totalIngredientQtyKG = 0; 
                    $totalInventoryKG = 0; 

                @endphp
                @foreach($group['ingredients'] as $ingredient)
                    <tr id="ingregients-row">
                        <td>{{ $ingredient->ingredient }}</td>
                        <td>{{ $ingredient->inventoryPerkg }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        @php
                        $totalInventoryKG += $ingredient->inventoryPerkg;
                        @endphp
                    </tr>
                @endforeach
                @foreach($group['inventories'] as $inventory)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ $inventory->booked_order_id }}</td>
                        <td>{{ $inventory->quantity }}</td>
                        <td>{{ $inventory->product_code }}</td>
                        <td>{{ $inventory->ingredient_quantity }}</td>
                        <td>{{ !empty($inventory->ending_inventoryDate) ? $inventory->ending_inventoryDate : $inventory->ending_inventoryChar }}</td>
                        <td>{{ $inventory->konjac32000cps_percent }}</td>
                        <td>{{ $inventory->konjac_gum200mesh_percent }}</td>
                        <td>{{ $inventory->konjac10000cps_percent }}</td>
                        <td>{{ $inventory->konjac36000cps_percent }}</td>
                        <td>{{ $inventory->agar_percent }}</td>
                        <td>{{ $inventory->tara_gum_percent }}</td>
                        <td>{{ $inventory->lbg_fg_percent }}</td>
                        <td>{{ $inventory->guar_gum_percent }}</td>
                        <td>{{ $inventory->nsg_20_percent }}</td>
                        <td>{{ $inventory->cassia_hgs_percent }}</td>
                        <td>{{ $inventory->cassia_gum_percent }}</td>
                        <td>{{ $inventory->xanthan200mesh_percent }}</td>
                        <td>{{ $inventory->xanthan80mesh_percent }}</td>
                        <td>{{ $inventory->cmc_lv_percent }}</td>
                        <td>{{ $inventory->cmc_hv_percent }}</td>
                        <td>{{ $inventory->icelite2_percent }}</td>

                        <td>{{ $inventory->mc_gel_percent }}</td>
                        <td>{{ $inventory->non_distilled_mono_gms_percent }}</td>
                        <td>{{ $inventory->distilled_mono_percent }}</td>
                        <td>{{ $inventory->sodium_alginate_percent }}</td>
                        <td>{{ $inventory->sodium_citrate_percent }}</td>
                        <td>{{ $inventory->potassium_citrate_percent }}</td>
                        <td>{{ $inventory->calcium_lactate_percent }}</td>
                        <td>{{ $inventory->calcium_acetate_percent }}</td>
                        <td>{{ $inventory->calcium_sulfate_percent }}</td>
                        <td>{{ $inventory->kci_percent }}</td>
                        <td>{{ $inventory->nacl_percent }}</td>
                        <td>{{ $inventory->maltodex_percent }}</td>
                        <td>{{ $inventory->dextrose_percent }}</td>
                        <td>{{ $inventory->refinedsugar_percent }}</td>
                        <td>{{ $inventory->silicon_dioxide_percent }}</td>
                        <td>{{ $inventory->wheat_gluten_percent }}</td>
                        <td>{{ $inventory->gellan_gum_percent }}</td>
                    </tr>
                    @php
                        $totalIngredientQtyKG += $inventory->ingredient_quantity;
                        $IngredientInventoryDifference = $totalIngredientQtyKG-$totalInventoryKG;
                        $totalKonjac32000cps += $inventory->konjac32000cps_percent;
                        $totalKonjac_gum200mesh += $inventory->konjac_gum200mesh_percent;
                        $totalKonjac10000cps += $inventory->konjac10000cps_percent;
                        $totalKonjac36000cps += $inventory->konjac36000cps_percent;
                        $totalAgar += $inventory->agar_percent;
                        $totalTara_gum += $inventory->tara_gum_percent;
                        $totalLbg_fg += $inventory->lbg_fg_percent;
                        $totalGuar_gum += $inventory->guar_gum_percent;
                        $totalNsg_20 += $inventory->nsg_20_percent;
                        $totalCassia_hgs += $inventory->cassia_hgs_percent;
                        $totalCassia_gum += $inventory->cassia_gum_percent;
                        $totalXanthan200mesh += $inventory->xanthan200mesh_percent;
                        $totalXanthan80mesh += $inventory->xanthan80mesh_percent;
                        $totalCmc_lv_percent += $inventory->cmc_lv_percent;
                        $totalCmc_hv_percent += $inventory->cmc_hv_percent;
                        $totalIcelite2 += $inventory->icelite2_percent;
                        
                        $totalMc_gel += $inventory->mc_gel_percent;
                        $totalNon_distilled_mono_gms += $inventory->non_distilled_mono_gms_percent;
                        $totalDistilled_mono += $inventory->distilled_mono_percent;
                        $totalSodium_alginate += $inventory->sodium_alginate_percent;
                        $totalSodium_citrate += $inventory->sodium_citrate_percent;
                        $totalPotassium_citrate += $inventory->potassium_citrate_percent;
                        $totalCalcium_lactate += $inventory->calcium_lactate_percent;
                        $totalCalcium_acetate += $inventory->calcium_acetate_percent;
                        $totalCalcium_sulfate += $inventory->calcium_sulfate_percent;
                        $totalKci += $inventory->kci_percent;
                        $totalNacl += $inventory->nacl_percent;
                        $totalMaltodex += $inventory->maltodex_percent;
                        $totalDextrose += $inventory->dextrose_percent;
                        $totalRefinedsugar += $inventory->refinedsugar_percent;
                        $totalSilicon_dioxide += $inventory->silicon_dioxide_percent;
                        $totalWheat_gluten += $inventory->wheat_gluten_percent;
                        $totalGellan_gum += $inventory->gellan_gum_percent;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="5" style="text-align: right;"></td>
                    <td style="color: red;">{{ $totalIngredientQtyKG }}</td>
                    <td style="border: 1px solid red;">{{ $IngredientInventoryDifference }}</td>
                </tr>
            @endforeach
            <tr id="total_inventory">
                <td colspan="7" style="text-align: right; border:none;"></td>
                <td>{{ $totalKonjac32000cps }}</td>
                <td>{{ $totalKonjac_gum200mesh }}</td>
                <td>{{ $totalKonjac10000cps }}</td>
                <td>{{ $totalKonjac36000cps }}</td>
                <td>{{ $totalAgar }}</td>
                <td>{{ $totalTara_gum }}</td>
                <td>{{ $totalLbg_fg }}</td>
                <td>{{ $totalGuar_gum }}</td>
                <td>{{ $totalNsg_20 }}</td>
                <td>{{ $totalCassia_hgs }}</td>
                <td>{{ $totalCassia_gum }}</td>
                <td>{{ $totalXanthan200mesh }}</td>
                <td>{{ $totalXanthan80mesh }}</td>
                <td>{{ $totalCmc_lv_percent }}</td>
                <td>{{ $totalCmc_hv_percent }}</td>
                <td>{{ $totalIcelite2 }}</td>

                <td>{{ $totalMc_gel }}</td>
                <td>{{ $totalNon_distilled_mono_gms }}</td>
                <td>{{ $totalDistilled_mono }}</td>
                <td>{{ $totalSodium_alginate }}</td>
                <td>{{ $totalSodium_citrate }}</td>
                <td>{{ $totalPotassium_citrate }}</td>
                <td>{{ $totalCalcium_lactate }}</td>
                <td>{{ $totalCalcium_acetate }}</td>
                <td>{{ $totalCalcium_sulfate }}</td>
                <td>{{ $totalKci }}</td>
                <td>{{ $totalNacl }}</td>
                <td>{{ $totalMaltodex }}</td>
                <td>{{ $totalDextrose }}</td>
                <td>{{ $totalRefinedsugar }}</td>
                <td>{{ $totalSilicon_dioxide }}</td>
                <td>{{ $totalWheat_gluten }}</td>
                <td>{{ $totalGellan_gum }}</td>
            </tr>
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

</script>
@endsection
