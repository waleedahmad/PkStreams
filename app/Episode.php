<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Episode extends Model
{
    protected $table = 'episodes';

    public function season(){
        return $this->hasOne('App\Season', 'id', 'season_id');
    }

    public function length(){
        /*$ffmpeg = \FFMpeg\FFProbe::create([
            'ffmpeg.binaries'  => 'C:/ffmpeg-3.3.3-win32-static/bin/ffmpeg.exe',
            'ffprobe.binaries' => 'C:/ffmpeg-3.3.3-win32-static/bin/ffprobe.exe'
        ]);*/
    }
}
