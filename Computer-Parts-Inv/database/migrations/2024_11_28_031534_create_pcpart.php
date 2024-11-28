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
        Schema::create('pcpart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pcpart_id')->constrained('partcategory');
            $table->foreignId('manufacturer_id')->references('id')->on('manufacturer')->onDelete('cascade');
            $table->string('pcpart_name');
            $table->string('pcpart_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pcpart');
    }
};
