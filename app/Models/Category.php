<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
        'parent_id',
        'title',
        'url',
        'desc',
        'thumbnail',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products');
    }
//    public function getProductIds()
//    {
//        $ids = [];
//        foreach ($this->products as $product){
//            $ids[] = $product->id;
//        }
//        return '['.implode(',', $ids).']';
//    }
}