<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('potensis', function (Blueprint $table) {
            $table->renameColumn('name', 'nama');
            $table->foreignId('sektor_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('potensis', function (Blueprint $table) {
            $table->renameColumn('nama', 'name');
            $table->dropForeign(['sektor_id']);
            $table->dropColumn('sektor_id');
        });
    }
};