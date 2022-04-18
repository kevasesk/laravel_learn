<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends CrudController
{


    protected $modelClass = \App\Models\Product::class;

    protected $routeClass = \App\Routes\ProductsRoutes::class;

    protected $modelTitle = 'Products';

    protected $columns = [
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
        [ 'column' => 'color', 'title' => 'Color',],//select
        [ 'column' => 'is_popular', 'title' => 'Is Popular', 'type' => 'boolean' ],
        [ 'column' => 'is_top_rated', 'title' => 'Is Top Rated', 'type' => 'boolean' ],
        [ 'column' => 'is_new', 'title' => 'Is New', 'type' => 'boolean' ],
        [ 'column' => 'gallery', 'title' => 'Gallery', 'type' => 'container', 'child' => 'galleryImages', 'contentType' => 'images'],
    ];

    protected $validateRules = [
        'title' => 'required',
        'url' => 'required',
        'is_active' => 'required',
        'thumbnail' => 'image|max:20000',
    ];

    protected $fileDir = 'products';

    protected $fileAttributes = [
        'thumbnail'
    ];

    protected $relations = [
        'onetomany'  => [
            ['key' => 'product_id', 'relationField' => 'galleryImages', 'type' => 'images']
         ],
        'manytomany' => 'categories'
    ];//TODO relation select


}
