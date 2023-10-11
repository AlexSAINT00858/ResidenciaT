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
        Schema::create('offerts_with_out_data', function (Blueprint $table) {
            $table->string('offerImage',20);
            $table->date('publicationDate')->primary();
            $table->date('eliminationDate');
            $table->string('email',45);
            $table->char('state',9);
            $table->foreign('email')->references('email')->on('companies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offerts_with_out_data');
    }
};
