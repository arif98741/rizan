<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Researchwork extends Model
{
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
