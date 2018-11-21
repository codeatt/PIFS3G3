<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Titulo');
            $table->string('Autor');
            $table->float('Preco');
            $table->float('QtdEstoque');
            $table->int('Edicao');
            $table->int('Ativo');
            $table->int('EditoraId');
            $table->int('CategoriaId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livro');
    }
}
