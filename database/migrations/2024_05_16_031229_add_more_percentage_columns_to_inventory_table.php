<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMorePercentageColumnsToInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_table', function (Blueprint $table) {
            $table->double('konjac32000cps_percent', 19, 6);
            $table->double('konjac_gum200mesh_percent', 19, 6);
            $table->double('konjac10000cps_percent', 19, 6);
            $table->double('konjac36000cps_percent', 19, 6);
            $table->double('agar_percent', 19, 6);
            $table->double('tara_gum_percent', 19, 6);
            $table->double('lbg_fg_percent', 19, 6);
            $table->double('guar_gum_percent', 19, 6);
            $table->double('nsg_20_percent', 19, 6);
            $table->double('cassia_hgs_percent', 19, 6);
            $table->double('cassia_gum_percent', 19, 6);
            $table->double('xanthan200mesh_percent', 19, 6);
            $table->double('xanthan80mesh_percent', 19, 6);
            $table->double('cmc_lv_percent', 19, 6);
            $table->double('cmc_hv_percent', 19, 6);
            $table->double('icelite2_percent', 19, 6);
            $table->double('mc_gel_percent', 19, 6);
            $table->double('non_distilled_mono_gms_percent', 19, 6);
            $table->double('distilled_mono_percent', 19, 6);
            $table->double('sodium_alginate_percent', 19, 6);
            $table->double('sodium_citrate_percent', 19, 6);
            $table->double('potassium_citrate_percent', 19, 6);
            $table->double('calcium_lactate_percent', 19, 6);
            $table->double('calcium_acetate_percent', 19, 6);
            $table->double('calcium_sulfate_percent', 19, 6);
            $table->double('kci_percent', 19, 6);
            $table->double('nacl_percent', 19, 6);
            $table->double('maltodex_percent', 19, 6);
            $table->double('dextrose_percent', 19, 6);
            $table->double('refinedsugar_percent', 19, 6);
            $table->double('silicon_dioxide_percent', 19, 6);
            $table->double('wheat_gluten_percent', 19, 6);
            $table->double('gellan_gum_percent', 19, 6);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory_table', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
}
