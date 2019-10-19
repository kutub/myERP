<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customers_id')->unsigned()->index();
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->float('total')->nullable();
            $table->float('cash')->nullable();
            $table->float('due')->nullable();
            $table->string('pay_by')->nullable();
            $table->string('invoice')->nullable();
            $table->string('created_by')->nullable();
            $table->integer('transport')->nullable();
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
        Schema::dropIfExists('sales');
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign('sales_customer_id_foreign');
        });
    }
}
