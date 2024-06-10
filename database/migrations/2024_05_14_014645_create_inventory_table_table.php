<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_table', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('booked_order_id')->nullable();
            $table->foreign('booked_order_id')->references('id')->on('booked_orders')->onDelete('cascade');
            $table->double('quantity', 19, 6);
            // $table->unsignedBigInteger('product_code_id');
            // $table->foreign('product_code_id')->references('id')->on('product_codes')->onDelete('cascade');
            $table->double('ingredient_quantity', 19, 6);
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
        Schema::dropIfExists('inventory_table');
    }
}
