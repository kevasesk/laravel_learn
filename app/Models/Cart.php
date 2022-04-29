<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'company',
        'phone',
        'city',
        'country',
        'postcode',
        'address',
        'note',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_items', 'cart_id', 'product_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function getCartItems()
    {
        $cartItems = CartItem::query()->where('cart_id','=', $this->id)->get();
        $productsData = $this->products()->get();
        $map = [];
        foreach ($productsData as $productsDataItem){
            $map[$productsDataItem->id] = $productsDataItem;
        }
        foreach ($cartItems as $cartItem){
            $cartItem->title = $map[$cartItem->product_id]->title;
        }
        return $cartItems;
    }
    public function getTotalQty()
    {
        $totalQty = 0;
        foreach ($this->getCartItems() as $cartItem){
            $totalQty += $cartItem->qty;
        }
        return $totalQty;
    }
    public function getSubtotal()
    {
        $totalCost = 0;
        foreach ($this->getCartItems() as $cartItem){
            $totalCost += $cartItem->price * $cartItem->qty;
        }
        return $totalCost;
    }
}
