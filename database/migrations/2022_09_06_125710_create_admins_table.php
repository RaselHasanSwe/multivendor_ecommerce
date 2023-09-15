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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('store_name')->nullable();
            $table->string('store_social_link')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('mobile')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_seller')->default(false);
            $table->boolean('verified')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
};
