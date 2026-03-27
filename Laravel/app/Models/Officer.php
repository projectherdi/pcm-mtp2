<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $fillable = ['name', 'position', 'image', 'sort_order', 'linkedin_url', 'email'];
}
