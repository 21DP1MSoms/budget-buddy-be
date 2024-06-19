<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditorsTable extends Migration
{
    public function up()
    {
        Schema::create('creditors', function (Blueprint $table) {
            $table->string('CreditorID')->primary();
            $table->string('CreditorName');
            $table->string('CreditorContactInfo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('creditors');
    }
}
