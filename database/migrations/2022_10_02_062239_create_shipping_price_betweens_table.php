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
        Schema::create('shipping_price_betweens', function (Blueprint $table) {
            $table->id();
            $table->double('amount_lte_10', 8, 2)->nullable();
            $table->double('amount_lte_20', 8, 2)->nullable();
            $table->double('amount_lte_30', 8, 2)->nullable();
            $table->double('amount_lte_40', 8, 2)->nullable();
            $table->double('amount_lte_50', 8, 2)->nullable();
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
        Schema::dropIfExists('shipping_price_betweens');
    }
};
