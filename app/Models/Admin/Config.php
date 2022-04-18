<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    public static $fields = [
        'logo'    => [ 'title'=> 'Logo', 'type' => 'image', ],
        'phone'   => [ 'title'=> 'Phone'],
        'email'   => [ 'title'=> 'Email'],
        'address' => [ 'title'=> 'Address'],
    ];

}
