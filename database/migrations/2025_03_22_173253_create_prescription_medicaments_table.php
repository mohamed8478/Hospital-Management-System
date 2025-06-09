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
        Schema::create('prescription_medicaments', function (Blueprint $table) {
            $table->unsignedBigInteger('prescription_id');
            $table->unsignedBigInteger('medicament_id');
            $table->integer('quantity');
            $table->primary(['prescription_id', 'medicament_id']);
            $table->foreign('prescription_id')->references('id')->on('prescriptions');
            $table->foreign('medicament_id')->references('id')->on('medications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_medicaments');
    }
};
