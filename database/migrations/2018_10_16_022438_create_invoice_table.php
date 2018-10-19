<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->decimal('subTotal',8,2);
            $table->decimal('iva',8,2);
            $table->decimal('total',8,2);
            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('company');
            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('id')->on('client');
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
        Schema::dropIfExists('invoice');
    }
}
