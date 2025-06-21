<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAnalisaPotensisFields extends Migration
{
    public function up(): void
    {
        Schema::table('analisa_potensis', function (Blueprint $table) {
            // Ubah json jadi text karena input pakai Textarea
            $table->text('ketersediaan_utilitas')->nullable()->change();
            $table->text('sarana_prasarana')->nullable()->change();

            // Tambahan enum value kalau perlu
            DB::statement("ALTER TABLE analisa_potensis MODIFY status_lahan ENUM('SHM', 'HGB', 'Sewa', 'Milik Negara', 'Lainnya') NULL");
        });
    }

    public function down(): void
    {
        Schema::table('analisa_potensis', function (Blueprint $table) {
            // Balik ke json kalau undo
            $table->json('ketersediaan_utilitas')->nullable()->change();
            $table->json('sarana_prasarana')->nullable()->change();

            DB::statement("ALTER TABLE analisa_potensis MODIFY status_lahan ENUM('SHM', 'HGB', 'Sewa', 'Lainnya') NULL");
        });
    }
}
