<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = [
        'season_id',
        'title',
        'episode_number',
        'duration',
        'synopsis',
        'video_url',
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
