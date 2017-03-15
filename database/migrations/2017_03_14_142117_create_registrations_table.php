<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('code');
            $table->string('nome');
            $table->string('nome_r');
            $table->date('dob');
            $table->string('rg');
            $table->string('cidade');
            $table->char('uf', 2);
            $table->string('telefone');
            $table->string('email');
            $table->string('estudo_trabalho');
            $table->boolean('restricao')->default(0);
            $table->boolean('creche')->default(0);
            $table->text('obs');
            $table->boolean('pago')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('registrations');
    }
}
