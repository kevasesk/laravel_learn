<?php

namespace App\Http\Controllers\Admin;

class ImageBlockController extends CrudController
{
    protected $modelClass = \App\Models\ImageBlock::class;

    protected $routeClass = \App\Routes\ImageBlockRoutes::class;

    protected $modelTitle = 'Image Blocks';

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id', 'hidden' => true],
        [ 'column' => 'key', 'title' => 'Key'],
        [ 'column' => 'first_title', 'title' => 'First Title'],
        [ 'column' => 'second_title', 'title' => 'Second Title'],
        [ 'column' => 'url', 'title' => 'Url'],
        [ 'column' => 'image', 'title' => 'Image', 'type' => 'image'],
    ];

    protected $validateRules = [
        'key' => 'required|unique:image_blocks',
        'image' => 'required|image',
    ];

    protected $fileDir = 'image_blocks';

    protected $fileAttributes = [
        'image'
    ];
//
//    protected $relations = 'categories';
}
