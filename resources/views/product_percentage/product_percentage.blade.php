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
                        <a href="{{ route('product_percentage.product_percentage-create') }}" class="btn btn-primary">
                            Create Inventory
                        </a>
        <div class="table-responsive">
            <table id="table" class="table table-hover dt-responsive nowrap w-100 tables">
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Ingredient Quantity</th>
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
                    @foreach($productPercentages as $item)
                        <tr>
                            <td>{{ $item->oitm ? $item->oitm->ItemName : ''}}</td> 
                            <td>{{ number_format($item->quantity_percent, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->konjac32000cps, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->konjac_gum200mesh, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->konjac10000cps, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->konjac36000cps, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->agar, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->tara_gum, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->lbg_fg, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->guar_gum, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->nsg_20, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->cassia_hgs, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->cassia_gum, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->xanthan200mesh, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->xanthan80mesh, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->cmc_lv, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->cmc_hv, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->icelite2, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->mc_gel, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->non_distilled_mono_gms, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->distilled_mono, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->sodium_alginate, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->sodium_citrate, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->potassium_citrate, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->calcium_lactate, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->calcium_acetate, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->calcium_sulfate, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->kci, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->nacl, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->maltodex, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->dextrose, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->refinedsugar, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->silicon_dioxide, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->wheat_gluten, 2, '.', ',') }}</td>
                            <td>{{ number_format($item->gellan_gum, 2, '.', ',') }}</td>
                           
    
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editInventoryModal{{ $item->id }}">Edit</button>
                                <form action="{{ route('product_percentages.destroy', $item) }}" method="POST" style="display: inline;">
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
                                        <form action="{{ route('product_percentages.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            {{-- <div class="form-group">
                                                <label for="type">Booked Order</label>
                                                <select class="form-control" id="booked_order_id" name="booked_order_id">
                                                    <option value="" selected disabled>Select Booked Order</option>
                                                    @foreach($bookedOrders as $orderItem)
                                                        <option value="{{ $orderItem->id }}" {{ $item->booked_order_id == $orderItem->id ? 'selected' : '' }}>{{ $orderItem->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
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
                                                <label for="quantity_percent">Ingredient Quantity</label>
                                                <input type="number" class="form-control quantity" id="quantity_percent" name="quantity_percent" value="{{ $item->quantity_percent }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="konjac32000cps">KONJAC 32,000cps</label>
                                                <input type="number" class="form-control konjac32000cps" id="konjac32000cps" name="konjac32000cps" value="{{ $item->konjac32000cps }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="konjac_gum200mesh">KONJAC GUM 200 mesh</label>
                                                <input type="number" class="form-control konjac_gum200mesh" id="konjac_gum200mesh" name="konjac_gum200mesh" value="{{ $item->konjac_gum200mesh }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="konjac10000cps">KONJAC 10,000cps</label>
                                                <input type="number" class="form-control konjac10000cps" id="konjac10000cps" name="konjac10000cps" value="{{ $item->konjac10000cps }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="konjac36000cps">KONJAC 36,000cps</label>
                                                <input type="number" class="form-control konjac36000cps" id="konjac36000cps" name="konjac36000cps" value="{{ $item->konjac36000cps }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="agar">AGAR</label>
                                                <input type="number" class="form-control agar" id="agar" name="agar" value="{{ $item->agar }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="tara_gum">TARA GUM</label>
                                                <input type="number" class="form-control tara_gum" id="tara_gum" name="tara_gum" value="{{ $item->tara_gum }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="lbg_fg">LBG fg</label>
                                                <input type="number" class="form-control lbg_fg" id="lbg_fg" name="lbg_fg" value="{{ $item->lbg_fg }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="guar_gum">GUAR GUM</label>
                                                <input type="number" class="form-control guar_gum" id="guar_gum" name="guar_gum" value="{{ $item->guar_gum }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="nsg_20">NSG-20 (Hydrolyzed Guar Gum)</label>
                                                <input type="number" class="form-control nsg_20" id="nsg_20" name="nsg_20" value="{{ $item->nsg_20 }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cassia_hgs">CASSIA - HGS</label>
                                                <input type="number" class="form-control cassia_hgs" id="cassia_hgs" name="cassia_hgs" value="{{ $item->cassia_hgs }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cassia_gum">CASSIA GUM Food Grade</label>
                                                <input type="number" class="form-control cassia_gum" id="cassia_gum" name="cassia_gum" value="{{ $item->cassia_gum }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="xanthan200mesh">XANTHAN (200 Mesh)</label>
                                                <input type="number" class="form-control xanthan200mesh" id="xanthan200mesh" name="xanthan200mesh" value="{{ $item->xanthan200mesh }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="xanthan80mesh">XANTHAN (80 Mesh)</label>
                                                <input type="number" class="form-control xanthan80mesh" id="xanthan80mesh" name="xanthan80mesh" value="{{ $item->xanthan80mesh }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cmc_lv">CMC-LV</label>
                                                <input type="number" class="form-control cmc_lv" id="cmc_lv" name="cmc_lv" value="{{ $item->cmc_lv }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cmc_hv">CMC-HV</label>
                                                <input type="number" class="form-control cmc_hv" id="cmc_hv" name="cmc_hv" value="{{ $item->cmc_hv }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="icelite2">ICELITE #2</label>
                                                <input type="number" class="form-control icelite2_percent" id="icelite2" name="icelite2" value="{{ $item->icelite2 }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="mc_gel">MC GEL</label>
                                                <input type="number" class="form-control mc_gel_percent" id="mc_gel" name="mc_gel" value="{{ $item->mc_gel }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="non_distilled_mono_gms">Non-Distilled Mono GMS 400V or PS200S</label>
                                                <input type="number" class="form-control non_distilled_mono_gms" id="non_distilled_mono_gms" name="non_distilled_mono_gms" value="{{ $item->non_distilled_mono_gms }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="distilled_mono">Distilled Mono DPV-1</label>
                                                <input type="number" class="form-control distilled_mono" id="distilled_mono" name="distilled_mono" value="{{ $item->distilled_mono }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="sodium_alginate">SODIUM ALGINATE</label>
                                                <input type="number" class="form-control sodium_alginate" id="sodium_alginate" name="sodium_alginate" value="{{ $item->sodium_alginate }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="sodium_citrate">SODIUM CITRATE</label>
                                                <input type="number" class="form-control sodium_citrate" id="sodium_citrate" name="sodium_citrate" value="{{ $item->sodium_citrate }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="potassium_citrate">POTASSIUM CITRATE</label>
                                                <input type="number" class="form-control potassium_citrate" id="potassium_citrate" name="potassium_citrate" value="{{ $item->potassium_citrate }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="calcium_lactate">CALCIUM LACTATE</label>
                                                <input type="number" class="form-control calcium_lactate" id="calcium_lactate" name="calcium_lactate" value="{{ $item->calcium_lactate }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="calcium_acetate">CALCIUM ACETATE</label>
                                                <input type="number" class="form-control calcium_acetate" id="calcium_acetate" name="calcium_acetate" value="{{ $item->calcium_acetate }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="calcium_sulfate">CALCIUM SULFTAE</label>
                                                <input type="number" class="form-control calcium_sulfate" id="calcium_sulfate" name="calcium_sulfate" value="{{ $item->calcium_sulfate }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="kci">KCl</label>
                                                <input type="number" class="form-control kci" id="kci" name="kci" value="{{ $item->kci }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="nacl">NaCl</label>
                                                <input type="number" class="form-control nacl" id="nacl" name="nacl" value="{{ $item->nacl }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="maltodex">MALTODEX</label>
                                                <input type="number" class="form-control maltodex" id="maltodex" name="maltodex" value="{{ $item->maltodex }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="dextrose">DEXTROSE</label>
                                                <input type="number" class="form-control dextrose" id="dextrose" name="dextrose" value="{{ $item->dextrose }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="refinedsugar">Refined Sugar w/ ACA</label>
                                                <input type="number" class="form-control refinedsugar" id="refinedsugar" name="refinedsugar" value="{{ $item->refinedsugar }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="silicon_dioxide">SILICON DIOXIDE</label>
                                                <input type="number" class="form-control silicon_dioxide" id="silicon_dioxide" name="silicon_dioxide" value="{{ $item->silicon_dioxide }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="wheat_gluten">WHEAT GLUTEN</label>
                                                <input type="number" class="form-control wheat_gluten" id="wheat_gluten" name="wheat_gluten" value="{{ $item->wheat_gluten }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="gellan_gum">Gellan Gum HA</label>
                                                <input type="number" class="form-control gellan_gum" id="gellan_gum" name="gellan_gum" value="{{ $item->gellan_gum }}" >
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

@endsection
