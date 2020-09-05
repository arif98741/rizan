<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = [
        'name', 'restaurant_id', 'price', 'slug', 'feature_photo', 'description'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class)->withDefault();
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function feature_food()
    {
        return $this->hasOne(FeatureFood::class);
    }

    public function food_review()
    {
        return $this->hasMany(FoodReview::class);
    }


}
