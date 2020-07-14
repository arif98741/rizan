<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodReview extends Model
{
    protected $fillable = [
        'name',
        'email',
        'food_id',
        'restaurant_id',
        'comment',
        'ip',
        'next_comment'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class)->withDefault();
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class)->withDefault();;
    }

}
