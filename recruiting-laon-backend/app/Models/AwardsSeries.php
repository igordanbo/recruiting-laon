<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AwardsSeries extends Model
{
    protected $fillable = [
        'title',
    ];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
