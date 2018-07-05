<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    protected $fillable = ['title','description','start_date','end_date', 'price'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'campeonatos';
}
