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
            $table->string('Ra')->nullable();
            $table->string('Cpf')->nullable();
            $table->string('Cidade')->nullable();
            $table->string('Cep')->nullable();
            $table->string('Rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('Estado')->nullable();
            $table->text('fav_film')->nullable();
            /**$table->foreignId('id_user')->default('1')*/; 
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
