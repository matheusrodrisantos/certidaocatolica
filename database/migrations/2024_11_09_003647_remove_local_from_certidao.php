<?php

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
        Schema::table('certidoes', function (Blueprint $table) {
            $table->dropColumn('local');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('certidoes', function (Blueprint $table) {
            $table->string('local')->nullable(); // Ajuste o tipo conforme necessário
        });
    }
};
