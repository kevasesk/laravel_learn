<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sku',
        'url',
        'qty',
        'is_active',
        'is_in_stock',
        'price',
        'sale_price',
        'sale_price_from',
        'sale_price_to',
        'desc',
        'short_desc',
        'thumbnail',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }
    public function getCategoryIds()
    {
        $ids = [];
        foreach ($this->categories as $category){
            $ids[] = $category->id;
        }
        return '['.implode(',', $ids).']';
    }

    public function getOldPrice()
    {
        if($this->sale_price){
            return $this->price;
        }
        return null;
    }
    public function getIsInStock()
    {
        $status = false;
        if(!$this->is_in_stock){
            $status = false;
        }else{
            if($this->qty < 1){
                $status = false;
            }else{
                $status = true;
            }
        }
        return $status;
    }
}
