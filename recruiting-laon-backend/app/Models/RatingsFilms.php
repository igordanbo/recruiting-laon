<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingsFilms extends Model
{
    protected $fillable = [
        'source',
        'rating',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
