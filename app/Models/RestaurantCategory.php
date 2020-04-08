<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class
RestaurantCategory extends Model
{
    protected $fillable =[
      'category_name'
    ];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
