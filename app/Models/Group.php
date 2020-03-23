<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
      'group_id'
    ];

    public function researchwork()
    {
        return $this->belongsTo(Researchwork::class);
    }
}
