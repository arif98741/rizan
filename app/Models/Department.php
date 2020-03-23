<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function student_meetings()
    {
        return $this->hasManyThrough(StudentMeeting::class,Meeting::class);
    }


}
