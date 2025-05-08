<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvancePurchaseRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_purchase_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_code')->nullable();
            $table->string('item_description')->nullable();
            $table->string('pr_no')->nullable();
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
        Schema::dropIfExists('advance_purchase_requests');
    }
}
