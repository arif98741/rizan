<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class
RestaurantCategory extends Model
{
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
