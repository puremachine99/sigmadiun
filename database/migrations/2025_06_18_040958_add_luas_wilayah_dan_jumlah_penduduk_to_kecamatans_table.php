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
            $table->float('luas_wilayah')->nullable()->after('geojson');
            $table->unsignedBigInteger('jumlah_penduduk')->default(0)->nullable()->after('luas_wilayah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kecamatans', function (Blueprint $table) {
            //
        });
    }
};
