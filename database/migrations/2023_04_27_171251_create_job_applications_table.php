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
        Schema::create('jobApplications', function (Blueprint $table) {
            $table->bigIncrements('idJobApplication');
            $table->unsignedBigInteger('idOffer');
            $table->string('CURP');
            
            $table->timestamps();
            $table->foreign('idOffer')->references('idOffer')->on('offerts');
            $table->foreign('CURP')->references('CURP')->on('candidates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobApplications');
    }
};
