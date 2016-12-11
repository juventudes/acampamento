<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAssinaturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assinaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->string('local');

            //ocupação, coletivo, escola, etc
            $table->string('local_politico'); 

            // para ordenar destaques
            $table->integer('prioridade')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assinaturas');
    }
}
