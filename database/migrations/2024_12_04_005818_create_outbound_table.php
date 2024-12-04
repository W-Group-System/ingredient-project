<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutboundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outbound', function (Blueprint $table) {
            $table->increments('id');
            $table->string('so_number')->nullable();
            $table->string('buyers_code')->nullable();
            $table->string('product_code')->nullable();
            $table->integer('qty')->nullable();
            $table->date('load_date')->nullable();
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
        Schema::dropIfExists('outbound');
    }
}
