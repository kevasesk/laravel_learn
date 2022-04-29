<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING_STATUS = 1;
    const CLOSED_STATUS = 2;
    const SHIPPED_STATUS = 3;
    const SUCCESS_STATUS = 4;

    use HasFactory;

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function getStatus()
    {
        switch ($this->status){
            case self::PENDING_STATUS: return 'pending';
            case self::CLOSED_STATUS: return 'closed';
            case self::SHIPPED_STATUS: return 'shipped';
            case self::SUCCESS_STATUS: return 'success';
        }
        return null;
    }
    public function getStatusClass()
    {
        switch ($this->status){
            case self::PENDING_STATUS:
            case self::SHIPPED_STATUS: return 'text-warning';
            case self::CLOSED_STATUS: return 'text-danger';
            case self::SUCCESS_STATUS: return 'text-success';
        }
        return null;
    }
}
