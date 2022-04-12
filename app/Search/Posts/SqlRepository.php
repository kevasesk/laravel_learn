<?php

namespace App\Search\Posts;

use App\Models\Post;

class SqlRepository implements \App\Search\SearchRepository
{
    public function search(string $query = '')
    {
        return Post::query()
            ->where('desc', 'like', "%{$query}%")
            ->orWhere('title', 'like', "%{$query}%")
            ->get();
    }
}
