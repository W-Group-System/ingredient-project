<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPercentageTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('product_percentage_table', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('product_code')->nullable();
        $table->decimal('quantity_percent', 5, 2)->nullable();
        $table->decimal('konjac32000cps', 5, 2)->nullable();
        $table->decimal('konjac_gum200mesh', 5, 2)->nullable();
        $table->decimal('konjac10000cps', 5, 2)->nullable();
        $table->decimal('konjac36000cps', 5, 2)->nullable();
        $table->decimal('agar', 5, 2)->nullable();
        $table->decimal('tara_gum', 5, 2)->nullable();
        $table->decimal('lbg_fg', 5, 2)->nullable();
        $table->decimal('guar_gum', 5, 2)->nullable();
        $table->decimal('nsg_20', 5, 2)->nullable();
        $table->decimal('cassia_hgs', 5, 2)->nullable();
        $table->decimal('xanthan200mesh', 5, 2)->nullable();
        $table->decimal('xanthan80mesh', 5, 2)->nullable();
        $table->decimal('cmc_lv', 5, 2)->nullable();
        $table->decimal('cmc_hv', 5, 2)->nullable();
        $table->decimal('icelite2', 5, 2)->nullable();
        $table->decimal('mc_gel', 5, 2)->nullable();
        $table->decimal('non_distilled_mono_gms', 5, 2)->nullable();
        $table->decimal('distilled_mono', 5, 2)->nullable();
        $table->decimal('sodium_alginate', 5, 2)->nullable();
        $table->decimal('sodium_citrate', 5, 2)->nullable();
        $table->decimal('potassium_citrate', 5, 2)->nullable();
        $table->decimal('calcium_lactate', 5, 2)->nullable();
        $table->decimal('calcium_acetate', 5, 2)->nullable();
        $table->decimal('calcium_sulfate', 5, 2)->nullable();
        $table->decimal('kci', 5, 2)->nullable();
        $table->decimal('nacl', 5, 2)->nullable();
        $table->decimal('maltodex', 5, 2)->nullable();
        $table->decimal('dextrose', 5, 2)->nullable();
        $table->decimal('refinedsugar', 5, 2)->nullable();
        $table->decimal('silicon_dioxide', 5, 2)->nullable();
        $table->decimal('wheat_gluten', 5, 2)->nullable();
        $table->decimal('gellan_gum', 5, 2)->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_percentage_table');
    }
}
