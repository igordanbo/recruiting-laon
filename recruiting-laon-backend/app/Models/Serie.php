<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Serie extends Model
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
        return $this->hasMany(RatingsSeries::class);
    }

    public function awards()
    {
        return $this->hasMany(AwardsSeries::class);
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
    
    public function getImageUrlAttribute()
    {
        if (!$this->image) return null;

        try {
            return Storage::disk('s3')->temporaryUrl(
                $this->image,
                now()->addMinutes(10)
            );
        } catch (\Exception $e) {
            return null;
        }
    }
}
