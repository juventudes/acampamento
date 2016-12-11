<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assinatura extends Model 
{

    protected $fillable = ['nome', 'email', 'telefone', 'local',
                            'local_politico', 'prioridade'];
}
