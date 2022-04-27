<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Search\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'is_active',
        'title',
        'desc',
        'thumbnail',
    ];

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_category_posts', 'post_id', 'post_id');
    }
    public function getUrl()
    {
        $redirect = Redirect::query()
            ->where('entity_id','=', $this->id)
            ->where('type','=', Redirect::TYPE_BLOG_POST)
            ->first()
        ;
        return url($redirect->url);
    }
}
