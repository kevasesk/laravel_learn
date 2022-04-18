<?php

namespace App\Models;

use Carbon\Traits\Options;
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
        'status',
        'color',
        'is_popular',
        'is_top_rated',
        'is_new',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }
    public function galleryImages()
    {
        return $this->hasMany(GalleryImages::class);
    }

    public function cartItems()
    {
        return $this->belongsToMany(Cart::class, 'cart_items', 'product_id', 'product_id');
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
    public function getColorOptions()
    {
        return \App\Options\Colors::getOptions();
    }
    public function getBrandOptions()
    {
        return Product::query()->select('brand')->where('brand', '!=', null)->get();
    }
    public function getCategoriesFilter()
    {
        $categories = Category::query()->where('id','!=', 1)->get();
        $result = [];
        foreach ($categories as $category) {
            if($category->products()){
                $result[] = [
                    'id' => $category['id'],
                    'title' => $category['title'],
                    'url' => url($category['url']),
                    'total' => count($category->products)
                ];
            }
        }
        return $result;
    }
    public function getPriceFilter()
    {
        $products = Product::query()->orderBy('price')->get();
        return [
            'min' => $products[0]['price'],
            'max' => $products[count($products)-1]['price']
        ];

    }
}
