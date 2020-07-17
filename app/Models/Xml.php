<?php
/**
 * Copyright (c) $today.This file is a property of Ariful Islam is a  property and maintained by me.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Xml extends Model
{
    protected $fillable = [
        'file_name', 'route', 'description', 'title'
    ];
}
