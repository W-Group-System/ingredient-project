<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvancePurchaseOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pr_id')->nullable();
            $table->string('item_description')->nullable();
            $table->string('item_code')->nullable();
            $table->string('po_no')->nullable();
            $table->integer('quantity')->nullable();
            $table->date('posting_date')->nullable();
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
        Schema::dropIfExists('advance_purchase_orders');
    }
}
