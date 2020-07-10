<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantReview extends Model
{
    protected $fillable = [
        'name',
        'email',
        'restaurant_id',
        'comment',
        'ip',
        'next_comment'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}
