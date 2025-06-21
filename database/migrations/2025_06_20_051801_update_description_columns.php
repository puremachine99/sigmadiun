<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDescriptionColumns extends Migration
{
    public function up(): void
    {
        // Tambahkan deskripsi ke kecamatans
        Schema::table('kecamatans', function (Blueprint $table) {
            $table->longText('description')->nullable()->after('geojson');
        });

        // Tambahkan deskripsi ke kelurahans
        Schema::table('kelurahans', function (Blueprint $table) {
            $table->longText('description')->nullable()->after('nama');
        });

        // Ubah deskripsi pada potensis menjadi longText
        Schema::table('potensis', function (Blueprint $table) {
            $table->longText('description')->nullable()->change();
        });
    }

    public function down(): void
    {
        // Revert perubahan
        Schema::table('kecamatans', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('kelurahans', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('potensis', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
        });
    }
}
