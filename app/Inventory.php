<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory_table';

    protected $fillable = [
        'booked_order_id',
        'quantity',
        'ingredient_quantity',
        'groupid',
        'ending_inventoryDate',
        'ending_inventoryChar',
        'product_code',
        'konjac32000cps_percent',
        'konjac_gum200mesh_percent',
        'konjac10000cps_percent',
        'konjac36000cps_percent',
        'agar_percent',
        'tara_gum_percent',
        'lbg_fg_percent',
        'guar_gum_percent',
        'nsg_20_percent',
        'cassia_hgs_percent',
        'cassia_gum_percent',
        'xanthan200mesh_percent',
        'xanthan80mesh_percent',
        'cmc_lv_percent',
        'cmc_hv_percent',
        'icelite2_percent',
        'mc_gel_percent',
        'non_distilled_mono_gms_percent',
        'distilled_mono_percent',
        'sodium_alginate_percent',
        'sodium_citrate_percent',
        'potassium_citrate_percent',
        'calcium_lactate_percent',
        'calcium_acetate_percent',
        'calcium_sulfate_percent',
        'kci_percent',
        'nacl_percent',
        'maltodex_percent',
        'dextrose_percent',
        'refinedsugar_percent',
        'silicon_dioxide_percent',
        'wheat_gluten_percent',
        'gellan_gum_percent',

    ];

    public function bookedOrder()
    {
        return $this->belongsTo(BookedOrder::class, 'booked_order_id');
    }
    public function oitm()
    {
        return $this->belongsTo(Oitm::class, 'product_code', 'ItemCode');
    }
    public function productPercentage()
    {
        return $this->belongsTo(Oitm::class);
    }
}
