<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Criar nova tabela temporária com a ordem desejada das colunas
        Schema::create('fornecedores_temp', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('site');
            $table->string('uf');
            $table->string('email');
            $table->timestamps();
        });

        // Exclui tabela antiga caso exista
        Schema::dropIfExists('fornecedores');

        // Renomeia nova tabela para o nome original
        Schema::rename('fornecedores_temp', 'fornecedores');
    }

    public function down()
    {
        // ..
    }
};
