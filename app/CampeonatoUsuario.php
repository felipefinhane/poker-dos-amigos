<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampeonatoUsuario extends Model
{
    protected $fillable = ['user_id','campeonato_id','administrator','stat'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'campeonato_usuarios';
}
