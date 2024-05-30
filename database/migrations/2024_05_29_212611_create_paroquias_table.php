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
        Schema::create('paroquias', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('cep');
            $table->string('endereco');
            $table->string('numero');

            $table->bigInteger('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades');


            $table->bigInteger('diocese_id')->unsigned();
            $table->foreign('diocese_id')->references('id')->on('dioceses');

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paroquias');
    }
};
