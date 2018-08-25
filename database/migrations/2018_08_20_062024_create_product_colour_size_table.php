<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductColourSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_colour_size', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('size_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('color_id')->references('id')->on('colours');
            $table->foreign('size_id')->references('id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_colour_size');
    }
}
