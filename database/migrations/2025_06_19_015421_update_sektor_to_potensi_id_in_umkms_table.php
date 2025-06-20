<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('umkms', function (Blueprint $table) {
            // Hapus kolom sektor lama
            $table->dropColumn('sektor');

            // Tambah foreign key baru ke potensis
            $table->foreignId('potensi_id')
                ->after('kelurahan_id')
                ->constrained()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('umkms', function (Blueprint $table) {
            // Rollback perubahan
            $table->dropForeign(['potensi_id']);
            $table->dropColumn('potensi_id');

            // Tambah kembali sektor lama
            $table->string('sektor')->after('kelurahan_id');
        });
    }
};

