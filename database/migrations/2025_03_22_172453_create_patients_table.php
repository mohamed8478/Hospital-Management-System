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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender',['male','female']);
            $table->string('phone_num');
            $table->text('address');
            $table->string('maladies');
            $table->text('chronic_conditions');
            $table->string('email')->unique();
            $table->unsignedBigInteger('recep_id');
            $table->foreign('recep_id')->references('id')->on('receptionists');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
