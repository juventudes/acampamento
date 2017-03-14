<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
  protected $fillable = [
    'code', 'nome', 'nome_r', 'dob', 'rg', 'cidade', 'uf', 'telefone', 'email',
    'estudo_trabalho', 'restricao', 'creche', 'obs', 'pago'
  ];
}
