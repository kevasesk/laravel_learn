<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends CrudController
{
    protected $modelClass = \App\Models\Product::class;

    protected $routeClass = \App\Routes\ProductsRoutes::class;

    protected $modelTitle = 'Products';

    protected $validateRules = [
        'title' => 'required',
//        'url' => 'required',
        'is_active' => 'required',
        'thumbnail' => 'image|max:20000',
    ];

    protected $fileDir = 'products';

    protected $fileAttributes = [
        'thumbnail'
    ];

    protected $relations = [
        'onetomany'  => [
            ['key' => 'product_id', 'relationField' => 'galleryImages', 'type' => 'images'],
            ['key' => 'product_id', 'relationField' => 'tabs', 'type' => 'tabs'],
         ],
        'manytomany' => 'categories'
    ];//TODO relation select

    public function __construct()
    {
        $this->columns = [
            [ 'column' => 'id', 'title' => 'Id', 'hidden' => true],
            [ 'column' => 'sku', 'title' => 'Sku' ],
            [ 'column' => 'title', 'title' => 'Title' ],
            [ 'column' => 'url', 'title' => 'Url' ],
            [ 'column' => 'price', 'title' => 'Price' ],
            [ 'column' => 'qty', 'title' => 'Qty' ],
            [ 'column' => 'brand', 'title' => 'Brand' ],
            [ 'column' => 'is_in_stock', 'title' => 'Is In Stock', 'type' => 'boolean' ],
            [ 'column' => 'is_active', 'title' => 'Is Active', 'type' => 'boolean' ],
            [ 'column' => 'thumbnail', 'title' => 'Image', 'type' => 'image' ],

            [ 'column' => 'status', 'title' => 'Status',],//select
            [ 'column' => 'color', 'title' => 'Color', 'type' => 'select', 'options' => \App\Options\Colors::getOptions()],//select
            [ 'column' => 'is_popular', 'title' => 'Is Popular', 'type' => 'boolean' ],
            [ 'column' => 'is_top_rated', 'title' => 'Is Top Rated', 'type' => 'boolean' ],
            [ 'column' => 'is_new', 'title' => 'Is New', 'type' => 'boolean' ],
            [ 'column' => 'gallery', 'title' => 'Gallery', 'type' => 'container',
                'child' => 'galleryImages', 'contentType' => 'images', 'fields' => ['thumbnail']],
            [ 'column' => 'tabs', 'title' => 'Info Tabs', 'type' => 'container',
                'child' => 'tabs', 'contentType' => 'tabs', 'fields' => ['title', 'content']
            ],
        ];;
    }


}
