<?php

namespace App\Models;

use App\Meeting;
use App\Notifications\TeacherResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','address','mobile','department_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new TeacherResetPassword($token));
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

     public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

     public function researchworks()
    {
        return $this->hasMany(Researchwork::class);
    }




}
