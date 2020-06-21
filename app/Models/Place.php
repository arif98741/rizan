<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'place_name',
        'location',
        'slug',
        'initial_details',
        'tourist_attractions',
        'how_to_go',
        'feature_photo'
    ];
    /**
     * @var mixed
     */
    private $feature_photo;
}
