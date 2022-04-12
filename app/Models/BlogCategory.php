<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Search\Searchable;

class BlogCategory extends Model
{
    use HasFactory, Searchable;

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
