<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Film extends Model
{
    protected $fillable = [
        'title',
        'original_title',
        'year',
        'duration',
        'synopsis',
        'awards',
        'director',
        'image',
        'trailer_url',
        'status'
    ];

    protected $appends = ['image_url'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(RatingsFilms::class);
    }

    public function awards()
    {
        return $this->hasMany(AwardsFilms::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image
            ? Storage::url($this->image)
            : null;
    }
}
