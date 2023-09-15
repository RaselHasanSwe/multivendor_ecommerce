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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('sub_category_id')->nullable();
            $table->string('inner_category_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->string('product_name');
            $table->double('price', 8,2)->deafult(0);
            $table->integer('stock')->default(0);
            $table->double('discount_percent', 8,2)->default(0);
            $table->double('tax_percent', 8,2)->default(0);
            $table->string('cover_image')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->longText('size_measurement')->nullable();
            $table->double('width', 8,3)->default(0)->comment('cm');
            $table->double('height', 8,3)->default(0)->comment('cm');
            $table->double('depth', 8,3)->default(0)->comment('cm');
            $table->double('weight', 8,3)->default(0)->comment('lb');
            $table->boolean('is_hidden')->default(0);
            $table->boolean('status')->default(2)->comment('1=>active, 2=>requested, 3=>rejected');
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
        Schema::dropIfExists('products');
    }
};
