<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AwardsFilms extends Model
{
    protected $fillable = [
        'title',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
