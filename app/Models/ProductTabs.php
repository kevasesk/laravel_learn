<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTabs extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'title',
        'content',
        'position',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
