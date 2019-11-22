<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_filters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('filter_value_id');
            $table->unsignedBigInteger('product_id');
            $table->boolean('visible')->default(false);
            $table->timestamps();

            $table->foreign('filter_value_id')->references('id')->on('filter_values')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_filters');
    }
}
