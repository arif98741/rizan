<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeCategory extends Model
{
    public function notices()
    {
        return $this->hasMany(Notice::class);
    }
}
