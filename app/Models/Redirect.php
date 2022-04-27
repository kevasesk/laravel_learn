<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    use HasFactory;

    const TYPE_PAGE = 1;

    const TYPE_PRODUCT = 2;

    const TYPE_CATEGORY = 3;

    const TYPE_BLOG_POST = 4;
}
