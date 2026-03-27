<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'category', 'image', 'description'];

    protected function casts(): array
        {
            return [
                'image' => 'array', // Tambahkan ini agar Laravel otomatis mengubah array ke JSON
            ];
        }
}
