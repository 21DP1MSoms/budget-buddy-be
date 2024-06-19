<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduledPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('scheduled_payments', function (Blueprint $table) {
            $table->string('ScheduledPaymentID')->primary();
            $table->string('CostObjectID');
            $table->string('CostCategoryID');
            $table->float('Amount');
            $table->string('Frequency');
            $table->date('StartDate');
            $table->date('EndDate');
            $table->boolean('IsRecurring');
            $table->string('CreditorID');
            $table->date('NextPaymentDate');

            $table->foreign('CostObjectID')->references('CostObjectID')->on('cost_objects');
            $table->foreign('CostCategoryID')->references('CostCategoryID')->on('cost_categories');
            $table->foreign('CreditorID')->references('CreditorID')->on('creditors');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('scheduled_payments');
    }
}
