<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('unidade', function (Blueprint $table) {
        $table->id();
        $table->string('unidade', 10);
        $table->string('descricao');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('unidade');
}
};
