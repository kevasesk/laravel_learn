<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
        'title',
        'url',
        'desc',
        'thumbnail',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'blog_category_posts');
    }
}
