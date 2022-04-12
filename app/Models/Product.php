<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Search\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

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

    public function cartItems()
    {
        return $this->belongsToMany(Cart::class, 'cart_item', 'product_id', 'product_id');
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
    public function getImage($width = 100, $height = 50)
    {
        return $this->thumbnail ? asset('storage/'.$this->thumbnail) : "https://picsum.photos/$width/$height?".uniqid();
    }
}
