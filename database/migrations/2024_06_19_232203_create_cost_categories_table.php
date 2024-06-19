<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('cost_categories', function (Blueprint $table) {
            $table->string('CostCategoryID')->primary();
            $table->string('CostCategoryName');
            $table->string('CostCategoryDescription');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cost_categories');
    }
}
