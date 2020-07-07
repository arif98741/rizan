<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'food_id',
        'restaurant_id',
        'offer_price',
        'start_date',
        'end_date',
        'offer_description',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class)->withDefault();
    }

    public function food()
    {
        return $this->belongsTo(Food::class)->withDefault();
    }

}
