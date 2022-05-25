<?php

//namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//adicionei as linhas abaixo
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //adicionei a linha abaixo
        Model::unguard();
        $this->call('ProdutoTableSeeder'); //chamando o ProdutoTableSeeder

        //linha abaixo adicionada
        //$this->call(’UserTableSeeder’);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

//Execute o comando (php artisan db:seed)
class ProdutoTableSeeder extends Seeder {
    public function run()
    {
        DB::insert('INSERT INTO produtos(nome,quantidade,valor,descricao) VALUES (?,?,?,?)', array('Geladeira',
        2,5900,'Side by side com gelo na porta'));

        DB::insert('INSERT INTO produtos(nome,quantidade,valor,descricao) VALUES (?,?,?,?)', array('Fogão',5,9500,
        'Painel automatico e forno eletrico'));

        DB::insert('INSERT INTO produtos(nome,quantidade,valor,descricao) VALUES (?,?,?,?)', array('Microondas',1,1520,'Manda SMS quando termina de esquentar'));
    }
}