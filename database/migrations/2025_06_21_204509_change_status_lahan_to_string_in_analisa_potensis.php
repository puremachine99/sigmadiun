<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStatusLahanToStringInAnalisaPotensis extends Migration
{
    public function up(): void
    {
        Schema::table('analisa_potensis', function (Blueprint $table) {
            $table->string('status_lahan')->nullable()->change();
        });
    }

    public function down(): void
    {
        // Kalau perlu rollback ke ENUM lama
        Schema::table('analisa_potensis', function (Blueprint $table) {
            DB::statement("ALTER TABLE analisa_potensis MODIFY status_lahan ENUM('SHM', 'HGB', 'Sewa', 'Milik Negara', 'Lainnya') NULL");
        });
    }
}
