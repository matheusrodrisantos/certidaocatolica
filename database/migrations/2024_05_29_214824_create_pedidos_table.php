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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();


            $table->string('nome_completo');
            $table->string('nome_mae');
            $table->string('email');
            $table->date('data_nascimento');
            $table->date('data_batismo');
            $table->string('finalidade')->nullable();
            

            $table->bigInteger('diocese_id')->unsigned()->nullable();
            $table->foreign('diocese_id')->references('id')->on('dioceses');

            $table->bigInteger('cidade_id')->unsigned()->nullable();
            $table->foreign('cidade_id')->references('id')->on('cidades');


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
        Schema::dropIfExists('pedidos');
    }
};
