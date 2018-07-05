<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $fillable = ['campeonato_id','game_date'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'partidas';
}
