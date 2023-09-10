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
        Schema::create('offerts', function (Blueprint $table) {
            $table->bigIncrements('idOffer');
            $table->string('offerName',250);
            $table->string('descriptionOffer',250);
            $table->date('publicationDate');
            $table->decimal('salary',8,3);
            $table->unsignedBigInteger('idCompany');

            $table->timestamps();
            $table->foreign('idCompany')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offerts');
    }
};
