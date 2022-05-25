<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
    O primeiro ( up) ensina como criar a tabela produto, enquanto o segundo ( down) mostra como 
    desfazê-la, ou seja, fazer um rollback

    Para executar uma migration basta dar o comando (php artisan migrate).

    Se você acabou de executar o comando migrate e viu que alguma coisa não saiu como esperado, basta executar
    um (php artisan migrate:rollback)

    Execute o comando (php artisan db:seed)

    para atualizar o banco de dados (php artisan migrate:fresh)
*/

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('quantidade');
            $table->decimal('valor',6,2);
            $table->string('descricao');
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
        Schema::dropIfExists('produtos');
    }
};
