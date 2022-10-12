<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FatooraProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatoora_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fatoora_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('mount');

            $table->foreign('fatoora_id')->references('id')->on('fatooras')->onDelete('cascade');
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
        Schema::dropIfExists('fatoora_product');
    }
}
