<?php

namespace App\Options;

class Colors
{
    public static function getOptions()
    {
        return [
            1 => [
                'value' => 1,
                'title' => 'black',
                'color' => '<i class="dot black-d"></i>'
            ],
            2 => [
                'value' => 2,
                'title' => 'blue',
                'color' => '<i class="dot blue-sky"></i>'
            ],
            3 => [
                'value' => 3,
                'title' => 'brown',
                'color' => '<i class="dot brown"></i>'
            ],
            4 => [
                'value' => 4,
                'title' => 'white',
                'color' => '<i class="dot"></i>'
            ],
        ];
    }
}
