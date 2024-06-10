<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCassiaGumToProductPercentageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_percentage_table', function (Blueprint $table) {
            $table->decimal('cassia_gum', 5, 2)->nullable()->after('cassia_hgs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_percentage_table', function (Blueprint $table) {
            $table->dropColumn('cassia_gum');
        });
    }
}
