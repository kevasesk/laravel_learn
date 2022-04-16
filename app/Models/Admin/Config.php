<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    public static function config($key)
    {
        $config = Config::query()->where('key', '=', $key)->first();
        return $config ? $config['value'] : null;
    }
}
