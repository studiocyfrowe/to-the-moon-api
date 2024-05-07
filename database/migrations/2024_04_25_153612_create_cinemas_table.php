<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('phone_number');
            $table->string('email_address');
            $table->string('website_address');
            $table->string('location_address');
            $table->string('cinema_lat');
            $table->string('cinema_lng');
            $table->integer('city_id');
            $table->integer('cinema_type_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cinemas');
    }
};
