<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING_STATUS = 1;
    const CLOSED_STATUS = 2;
    const SHIPPED_STATUS = 3;

    use HasFactory;

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
