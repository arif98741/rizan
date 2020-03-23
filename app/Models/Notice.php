<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    public function notice_category()
    {
        return $this->belongsTo(NoticeCategory::class);
    }
}
