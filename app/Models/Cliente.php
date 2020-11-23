<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'public.cliente';

    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nome_cliente',
        'galc',
        'porta',
        'endereco_instalacao',
        'velocidade'
    ];
}
