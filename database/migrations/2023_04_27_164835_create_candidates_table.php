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
        Schema::create('candidates', function (Blueprint $table) {
            $table->string('CURP',18)->unique();
            $table->string('nameCandidate',20);
            $table->string('lastName',20);
            $table->string('phoneNumberCandidate',10);
            $table->string('emailCandidate',50)->unique();
            $table->string('jobTrade',40);
            $table->string('resumeCandidate',30);
            
            $table->primary('CURP');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
