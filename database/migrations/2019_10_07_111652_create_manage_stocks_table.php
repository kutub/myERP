<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManageStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('catagory_id');
            $table->integer('product_id');
            $table->mediumText('detail');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->string('truck_no')->nullable();
            $table->integer('transport')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('manage_stocks');
    }
}
