<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = [
        'name',
        'cpf',
        'data_nascimento',
        'email',
        'telefone',
        'endereco',
        'cidade',
        'estado',
    ];
}
