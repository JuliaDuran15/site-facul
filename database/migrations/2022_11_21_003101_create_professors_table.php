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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('name',80)->nullable();
            $table->string('Ra')->nullable();
            $table->string('Cpf')->nullable();
            $table->string('Cidade')->nullable();
            $table->string('Cep')->nullable();
            $table->string('Rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('Estado')->nullable();
            
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
        Schema::dropIfExists('professors');
    }
};
