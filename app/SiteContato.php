<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    protected $fillable = ['name', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];
}
