<?php

//para criar este arquivo é só digitar o comando (php artisan make:model Produto -m) no cmd
//foi criado um arquivo no database/migrations

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    use HasFactory;
}
