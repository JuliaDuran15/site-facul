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
            $table->foreignID('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->string('name',80)->nullable();
            $table->string('Ra')->nullable();
            $table->string('Cpf')->nullable();
            $table->string('Cidade')->nullable();
            $table->string('Cep')->nullable();
            $table->string('Rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('Estado')->nullable();
            $table->text('fav_film')->nullable();
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
