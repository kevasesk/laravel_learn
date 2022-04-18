<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_id',
        'thumbnail',
        'position'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
