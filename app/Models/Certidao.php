<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certidao extends Model
{
    use HasFactory;
    protected $table = 'certidoes';

    protected $fillable = [
        'data_batismo',
        'celebrante',
        'batizando',
        'data_nascimento',
        'nome_pai',
        'nome_mae',
        'livro',
        'folha',
        'numero',
        'paroco',
        'paroquia_id'
    ];

    public function paroquia()
    {
        return $this->belongsTo(Paroquia::class);
    }

}
