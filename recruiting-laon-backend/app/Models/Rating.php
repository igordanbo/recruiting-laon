<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'film_id',
        'source',
        'rating',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
