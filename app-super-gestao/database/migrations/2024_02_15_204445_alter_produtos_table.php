<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            // Remover colunas existentes
            $table->dropColumn(['name', 'descrição', 'preco_venda', 'estoque_minimo', 'estoque_maximo']);

            // Adicionar novas colunas
            $table->string('nome');
            $table->text('descricao');
            $table->unsignedBigInteger('unidade_id');

            // Definir a chave estrangeira referenciando a tabela unidade
            $table->foreign('unidade_id')->references('id')->on('unidade');
        });
    }

    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            // Reverter a ordem para rollback
            $table->dropForeign(['unidade_id']);
            $table->dropColumn(['nome', 'descricao', 'peso', 'unidade_id']);
        });
    }
};
