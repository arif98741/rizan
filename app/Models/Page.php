<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page_title','slug','description','object_description'
    ];
}
