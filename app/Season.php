<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'seasons';

    public function show(){
        return $this->hasOne('App\Show', 'id', 'show_id');
    }

    public function episodes(){
        return $this->hasMany('App\Episode', 'season_id', 'id')->orderBy('episode_no', 'DESC');
    }
}
