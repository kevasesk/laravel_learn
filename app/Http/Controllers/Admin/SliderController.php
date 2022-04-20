<?php

namespace App\Http\Controllers\Admin;

class SliderController extends CrudController
{
    protected $modelClass = \App\Models\Slider::class;

    protected $routeClass = \App\Routes\SliderRoutes::class;

    protected $modelTitle = 'Slider Images';

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id', 'hiddenInForm' => true],
        [ 'column' => 'title', 'title' => 'Title' ],
        [ 'column' => 'desc', 'title' => 'Desc' ],
        [ 'column' => 'url', 'title' => 'Url' ],
        [ 'column' => 'thumbnail', 'title' => 'Thumbnail', 'type'=> 'image' ],
        [ 'column' => 'position', 'title' => 'Position'],
    ];

    protected $validateRules = [
        'thumbnail' => 'required|image',
    ];

    protected $fileDir = 'slider';

    protected $fileAttributes = [
        'thumbnail'
    ];
}
