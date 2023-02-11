<?php

namespace App\Options;

use App\Models\Category;

class Categories
{
    public static function getOptions()
    {
        $options = Category::where('id', '!=', 1)->get();
        $result = [];

        foreach ($options as $option) {
            $result[] = [
                'value' => $option['id'],
                'title' => $option['title'],
            ];
        }

        return $result;
    }
}
