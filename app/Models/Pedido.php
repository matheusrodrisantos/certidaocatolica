<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;


class pedido extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome_completo',
        'nome_mae',
        'email',
        'data_nascimento',
        'data_batismo',
        'finalidade',
        'status',
        'diocese_id',
        'cidade_id',
        'paroquia_id'
    ];

    
}


