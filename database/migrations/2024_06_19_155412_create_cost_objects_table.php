<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCostObjectsTable extends Migration
{
    public function up()
    {
        Schema::create('cost_objects', function (Blueprint $table) {
            $table->string('CostObjectID')->primary();
            $table->string('CostObjectName');
            $table->string('CostObjectDescription');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cost_objects');
    }
}
