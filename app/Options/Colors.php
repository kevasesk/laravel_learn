<?php

namespace App\Options;

class Colors
{
    public static function getOptions()
    {
        return [
            [
                'value' => 1,
                'title' => 'black',
                'color' => '<i class="dot black-d"></i>'
            ],
            [
                'value' => 2,
                'title' => 'blue',
                'color' => '<i class="dot blue-sky"></i>'
            ],
            [
                'value' => 3,
                'title' => 'brown',
                'color' => '<i class="dot brown"></i>'
            ],
            [
                'value' => 4,
                'title' => 'white',
                'color' => '<i class="dot"></i>'
            ],
        ];
    }
}
