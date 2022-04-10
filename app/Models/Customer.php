<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',

        'company',
        'phone',
        'country',
        'city',
        'postcode',
        'address',
        'is_subscribed',
    ];
}
