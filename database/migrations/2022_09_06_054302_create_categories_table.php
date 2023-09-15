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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('position');
            $table->string('icon');
            $table->tinyInteger('show_product_by_subcategory_in_home')->default(false)->comment('0=hidden, 1=show');
            $table->tinyInteger('only_express_shipping')->default(false)->comment('0=No, 1=Yes');
            $table->tinyInteger('hide_category_from_home')->default(false)->comment('0=hide, 1=show');
            $table->tinyInteger('show_filter')->default(false)->comment('0=hide, 1=show');
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
        Schema::dropIfExists('categories');
    }
};
