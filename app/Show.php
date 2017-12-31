<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $table = 'shows';

    public function seasons(){
        return $this->hasMany('App\Season', 'show_id', 'id')->orderBy('season_no', 'DESC');
    }
}
