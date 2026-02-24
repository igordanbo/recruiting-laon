<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingsSeries extends Model
{
    protected $fillable = [
        'source',
        'rating',
    ];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
