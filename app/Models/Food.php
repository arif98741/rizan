<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'name', 'restaurant_id', 'price', 'slug', 'feature_photo', 'description'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
