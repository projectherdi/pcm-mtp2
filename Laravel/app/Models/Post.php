<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Post extends Model
{
    // Tambahkan category_id agar bisa disimpan secara mass-assignment
    protected $fillable = [
        'user_id', 
        'category_id', 
        'title', 
        'slug', 
        'content', 
        'image', 
        'status', 
        'published_at'
    ];

    /**
     * Relasi ke User (default)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Perbaikan Error: Tambahkan relasi author
     * Ini agar PostController->with('author') berfungsi
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Casting properti (disederhanakan untuk Post saja)
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    /**
     * Scope untuk artikel yang sudah terbit
     * Penggunaan di Controller: Post::published()->get();
     */
    public function scopePublished(Builder $query): void
    {
        $query->where('status', 'published')
              ->whereNotNull('published_at')
              ->where('published_at', '<=', Carbon::now());
    }
}