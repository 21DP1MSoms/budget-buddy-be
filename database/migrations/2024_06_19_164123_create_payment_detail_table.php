<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailTable extends Migration
{
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->string('PaymentDetailID')->primary();
            $table->string('PaymentID');
            $table->float('Amount');
            $table->date('PaymentDate');

            $table->foreign('PaymentID')->references('PaymentID')->on('payments');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_details');
    }
}

