<?php

namespace App\Models;

use App\Notifications\RestaurantResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Restaurant extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'restaurant_category_id', 'password',
        'location', 'slug', 'contact',
        'feature_photo', 'cover_photo',
        'facebook', 'instagram', 'website',
        'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RestaurantResetPassword($token));
    }

    public function restaurant_category()
    {
        return $this->belongsTo(RestaurantCategory::class)->withDefault();
    }

    public function feature_restaurant()
    {
        return $this->hasOne(FeatureRestaurant::class)->withDefault();
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function food_reviews()
    {
        return $this->hasMany(FoodReview::class);
    }


}
