<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartidaUsuario extends Model
{
    protected $fillable = ['partida_id','campeonato_usuario_id','paid','position','carrasco_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'partida_usuarios';
}
