<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualanDsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_ds', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('penjualan_id')->unsigned();
            $table->integer('qty');
            $table->decimal('harga');
            $table->string('barang');
            $table->foreign('penjualan_id')->references('id')->on('penjualans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan_ds');
    }
}
