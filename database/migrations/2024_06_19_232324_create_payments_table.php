<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->string('PaymentID')->primary();
            $table->string('ScheduledPaymentID');
            $table->date('PaymentDate');
            $table->float('AmountPaid');

            $table->foreign('ScheduledPaymentID')->references('ScheduledPaymentID')->on('scheduled_payments');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
