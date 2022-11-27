<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',80);
            $table->string('Ra');
            $table->string('Cpf');
            $table->string('Cidade');
            $table->string('Cep');
            $table->string('Rua');
            $table->string('numero');
            $table->string('Estado');
            $table->text('fav_film');
            $table->foreignId('id_user')->constrained('users'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};
