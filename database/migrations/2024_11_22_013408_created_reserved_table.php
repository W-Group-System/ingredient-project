<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedReservedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserved', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ingredient')->nullable();
            $table->string('inventory')->nullable();
            $table->string('book_orders')->nullable();
            $table->string('qty')->nullable();
            $table->string('product_code')->nullable();
            $table->string('ingredient_qty')->nullable();
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
        Schema::dropIfExists('reserved');
    }
}
