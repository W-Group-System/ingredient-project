<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductCodeToInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_table', function (Blueprint $table) {
            $table->string('product_code', 50)->collation('utf8_general_ci')->nullable()->after('quantity');
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
            $table->dropColumn('product_code');
        });
    }
}
