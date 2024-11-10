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
        Schema::create('certidaos', function (Blueprint $table) {
            $table->id();
            
            
            $table->date('data_batismo');
            $table->string('local');
            $table->string('celebrante');
            $table->string('batizando');
            $table->date('data_nascimento');
            $table->string('nome_mae');
            $table->string('nome_pai');
            
            $table->integer('livro');
            $table->integer('folha');
            $table->integer('numero');
            
            $table->string('paroco');        
            $table->bigInteger('paroquia_id')->unsigned()->nullable();
            $table->foreign('paroquia_id')->references('id')->on('paroquias');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certidaos');
    }
};
