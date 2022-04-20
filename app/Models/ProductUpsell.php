<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUpsell extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'child_id',
        'position'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
