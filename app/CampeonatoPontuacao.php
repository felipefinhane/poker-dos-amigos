<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampeonatoPontuacao extends Model
{
    protected $fillable = ['campeonato_id','position','value'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'campeonato_pontuacoes';
}
