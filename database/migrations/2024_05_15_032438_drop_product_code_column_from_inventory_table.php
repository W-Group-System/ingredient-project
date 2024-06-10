<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropProductCodeColumnFromInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_table', function (Blueprint $table) {
            $table->dropColumn('product_code');
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
            // Add the product_code column back
            $table->unsignedInteger('product_code')->nullable()->after('quantity');
        });
    }
}