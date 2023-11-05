<?php

    use App\Models\Company;
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
            $table->string('offerImage',27);
            $table->string('publicationDate',19)->primary();
            $table->date('eliminationDate');
            $table->string('email',45);
            $table->char('state',9);
            $table->foreign('email')
                ->references('email')
                ->on('companies')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'email', 'email');
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offerts_with_out_data');
    }
};
