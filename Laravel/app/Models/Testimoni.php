<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Testimoni extends Model
{
    use HasFactory;

    // Tambahkan 'avatar' dan kolom lainnya ke dalam array fillable
    protected $fillable = [
        'name',
        'position',
        'avatar', // Ini yang menyebabkan error tadi
        'content',
        'rating',
    ];
}
