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
        Schema::create('freeshippings', function (Blueprint $table) {
            $table->id();
            $table->double('amount', 8, 2)->deafult(0);
            $table->string('shipping_name');
            $table->string('delivery_time')->nullable();
            $table->longText('zip_code')->nullable();
            $table->boolean('status')->default(true)->comment('1=>active, 0=>deactive');
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
        Schema::dropIfExists('freeshippings');
    }
};
