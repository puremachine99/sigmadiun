<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kecamatans', function (Blueprint $table) {
            $table->dropColumn('luas_wilayah');
        });
    }

    public function down(): void
    {
        Schema::table('kecamatans', function (Blueprint $table) {
            $table->decimal('luas_wilayah', 10, 2)->nullable(); // asumsi tipe awal
        });
    }
};
