<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'facebook',
        'instagram',
        'twitter',
        'feature_photo',
    ];
}
