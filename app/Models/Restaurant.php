<?php

namespace App\Models;

use App\Notifications\RestaurantResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Restaurant extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'location','slug','contact',
        'feature_photo','cover_photo'
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
     * @param  string  $token
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
}
