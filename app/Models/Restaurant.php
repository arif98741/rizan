<?php

namespace App\Models;

use App\Notifications\CompanyResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Restaurant extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'slug', 'location','restaurant_category_id',
        'contact', 'feature_photo', 'cover_photo', 'website', 'facebook', 'instagram'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CompanyResetPassword($token));
    }

    public function restaurant_category()
    {
        return $this->belongsTo(RestaurantCategory::class);
    }
}
