<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_size_charts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('col_1')->nullable();
            $table->string('col_2')->nullable();
            $table->string('col_3')->nullable();
            $table->string('col_4')->nullable();
            $table->string('col_5')->nullable();
            $table->string('col_6')->nullable();
            $table->string('col_7')->nullable();
            $table->string('col_8')->nullable();
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
        Schema::dropIfExists('product_size_charts');
    }
};
