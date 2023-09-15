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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_sort_descriptions')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('phone_1st')->nullable();
            $table->string('phone_2nd')->nullable();
            $table->string('email_1st')->nullable();
            $table->string('email_2nd')->nullable();
            $table->longText('working_hour')->nullable();
            $table->longText('location')->nullable();
            $table->longText('map')->nullable();
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
        Schema::dropIfExists('site_settings');
    }
};
