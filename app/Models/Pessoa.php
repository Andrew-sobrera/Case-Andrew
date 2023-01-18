<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpfCnpj',
        'dt_nasc',
        'tp_pessoa',
        'nome_fantasia',
        'sobrenome',
    ];
}
