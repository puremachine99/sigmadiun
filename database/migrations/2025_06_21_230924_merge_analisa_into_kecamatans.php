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
        Schema::table('kecamatans', function (Blueprint $table) {
            $table->longText('sumber_daya_alam')->nullable();
            $table->longText('sumber_daya_buatan')->nullable();
            $table->string('alamat')->nullable();
            $table->decimal('luas_lahan', 10, 2)->nullable();
            $table->decimal('nilai_investasi', 15, 2)->nullable();
            $table->string('status_lahan')->nullable();
            $table->string('denah_lahan')->nullable();
            $table->string('pelaku_usaha')->nullable();
            $table->text('ketersediaan_utilitas')->nullable();
            $table->text('sarana_prasarana')->nullable();
            $table->string('keamanan')->nullable();
            $table->longText('rincian_proyek')->nullable();
            $table->longText('aspek_teknis')->nullable();
            $table->longText('aspek_pemasaran')->nullable();
            $table->longText('aspek_lokasi')->nullable();
            $table->longText('aspek_manajemen')->nullable();
            $table->longText('aspek_politik_ekonomi_sosial')->nullable();
            $table->longText('aspek_komersial')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
