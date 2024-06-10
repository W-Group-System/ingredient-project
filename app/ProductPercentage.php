<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPercentage extends Model
{
    protected $table = 'product_percentage_table';
    protected $fillable = [
        'product_code',
        'quantity_percent',
        'konjac32000cps',
        'konjac_gum200mesh',
        'konjac10000cps',
        'konjac36000cps',
        'agar',
        'tara_gum',
        'lbg_fg',
        'guar_gum',
        'nsg_20',
        'cassia_hgs',
        'cassia_gum',
        'xanthan200mesh',
        'xanthan80mesh',
        'cmc_lv',
        'cmc_hv',
        'icelite2',
        'mc_gel',
        'non_distilled_mono_gms',
        'distilled_mono',
        'sodium_alginate',
        'sodium_citrate',
        'potassium_citrate',
        'calcium_lactate',
        'calcium_acetate',
        'calcium_sulfate',
        'kci',
        'nacl',
        'maltodex',
        'dextrose',
        'refinedsugar',
        'silicon_dioxide',
        'wheat_gluten',
        'gellan_gum',
    ];
    public function oitm()
    {
        return $this->belongsTo(Oitm::class, 'product_code', 'ItemCode');
    }
}
