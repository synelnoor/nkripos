<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->string('code_barang');
            $table->string('nama_barang');
            $table->integer('qty');
            $table->decimal('harga', 11, 2);
            $table->decimal('harga_beli',11,2);
            $table->decimal('subtotal', 11, 2);
            $table->decimal('laba',11,2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_items');
    }
}
