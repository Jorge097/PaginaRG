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
    Schema::create('cotizaciones', function (Blueprint $table) {
        $table->id();
        $table->string('Name');
        $table->string('Phone', 15);
        $table->string('Email');
        $table->string('Location');
        $table->string('Crop');
        $table->string('Surface');
        $table->text('Comment')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
