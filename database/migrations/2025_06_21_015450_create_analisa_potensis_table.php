<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('analisa_potensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id')->constrained()->cascadeOnDelete();

            $table->longText('sumber_daya_alam')->nullable();
            $table->longText('sumber_daya_buatan')->nullable();
            $table->string('alamat')->nullable();
            $table->decimal('luas_lahan', 10, 2)->nullable();
            $table->decimal('nilai_investasi', 15, 2)->nullable();

            $table->enum('status_lahan', ['SHM', 'HGB', 'Sewa', 'Lainnya'])->nullable();
            $table->string('denah_lahan')->nullable(); // path atau URL

            $table->string('pelaku_usaha')->nullable();
            $table->json('ketersediaan_utilitas')->nullable(); // listrik, air, gas, internet
            $table->json('sarana_prasarana')->nullable(); // jalan, sekolah, dsb

            $table->string('keamanan')->nullable();
            $table->longText('rincian_proyek')->nullable();

            $table->longText('aspek_teknis')->nullable();
            $table->longText('aspek_pemasaran')->nullable();
            $table->longText('aspek_lokasi')->nullable();
            $table->longText('aspek_manajemen')->nullable();
            $table->longText('aspek_politik_ekonomi_sosial')->nullable();
            $table->longText('aspek_komersial')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analisa_potensis');
    }
};
