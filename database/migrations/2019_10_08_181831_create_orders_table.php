<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customers_id')->nullable()->unsigned()->index();
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('product_name');
            $table->integer('quantity');
            $table->float('taotal_price');
            $table->string('invoice');
            $table->integer('cash');
            $table->integer('due');
            $table->string('created_by');
            $table->integer('transport');
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
        Schema::dropIfExists('orders');
    }
}
