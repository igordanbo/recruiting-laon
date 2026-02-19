<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'title',
        'original_title',
        'year',
        'duration',
        'synopsis',
        'awards',
        'director'
    ];

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
        return $this->hasMany(Rating::class);
    }

    public function awards()
    {
        return $this->hasMany(Award::class);
    }
}
