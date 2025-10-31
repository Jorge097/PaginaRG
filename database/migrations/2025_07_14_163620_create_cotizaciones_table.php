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
    Schema::create(table: 'Cotizaciones', callback: function (Blueprint $table) {
        $table->id();
        $table->string(column: 'Name');
        $table->string(column: 'Phone', length: 15);
        $table->string(column: 'Email');
        $table->string(column: 'Location');
        $table->string(column: 'Crop');
        $table->string(column: 'Surface');
        $table->text(column: 'Comment')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'cotizaciones');
    }
};
