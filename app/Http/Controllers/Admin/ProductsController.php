<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends CrudController
{
    protected $modelClass = \App\Models\Product::class;

    protected $routeClass = \App\Routes\ProductsRoutes::class;

    protected $modelTitle = 'Products';

    protected $redirectType = \App\Models\Redirect::TYPE_PRODUCT;

    protected $validateRules = [
        'title' => 'required',
        'is_active' => 'required',
        'thumbnail' => 'image|max:20000',
    ];

    protected $fileDir = 'products';

    protected $fileAttributes = [
        'thumbnail'
    ];

    protected $relations = [
        'onetomany'  => [
            ['key' => 'product_id', 'relationField' => 'tabs', 'type' => 'tabs', 'fields' => ['title', 'content', 'position'] ],
            ['key' => 'product_id', 'relationField' => 'upsells', 'type' => 'tabs', 'fields' => ['child_id', 'position'] ],
            ['key' => 'product_id', 'relationField' => 'galleryImages', 'type' => 'images', 'fields' => ['thumbnail', 'position'] ],
         ],
        'manytomany' => [
            ['key' => 'product_id', 'relationField' => 'categories', 'type' => 'select', 'fields' => ['position'] ],
        ]
    ];//TODO relation select

    public function __construct()
    {
        $this->columns = [
            [ 'column' => 'id', 'title' => 'Id', 'hiddenInForm' => true],
            [ 'column' => 'sku', 'title' => 'Sku' ],
            [ 'column' => 'title', 'title' => 'Title' ],
            [ 'column' => 'url', 'title' => 'Url', 'hiddenInList' => true  ],
            [ 'column' => 'price', 'title' => 'Price' ],

            [ 'column' => 'sale_price', 'title' => 'Sale Price', 'hiddenInList' => true ],
            [ 'column' => 'sale_price_from', 'title' => 'sale_price_from', 'hiddenInList' => true],//TODO add date field
            [ 'column' => 'sale_price_to', 'title' => 'sale_price_to', 'hiddenInList' => true],

            [ 'column' => 'qty', 'title' => 'Qty' ],
            [ 'column' => 'brand', 'title' => 'Brand', 'hiddenInList' => true  ],
            [ 'column' => 'is_featured', 'title' => 'Is Featured', 'type' => 'boolean', 'hiddenInList' => true],
            [ 'column' => 'is_in_stock', 'title' => 'Is In Stock', 'type' => 'boolean', 'hiddenInList' => true],
            [ 'column' => 'is_active', 'title' => 'Is Active', 'type' => 'boolean', 'hiddenInList' => true ],
            [ 'column' => 'thumbnail', 'title' => 'Image', 'type' => 'image', 'hiddenInList' => true  ],

            [ 'column' => 'status', 'title' => 'Status', 'hiddenInList' => true ],//select
            [ 'column' => 'color', 'title' => 'Color', 'type' => 'select', 'options' => \App\Options\Colors::getOptions(), 'hiddenInList' => true],//select
            [ 'column' => 'is_popular', 'title' => 'Is Popular', 'type' => 'boolean', 'hiddenInList' => true  ],
            [ 'column' => 'is_top_rated', 'title' => 'Is Top Rated', 'type' => 'boolean', 'hiddenInList' => true  ],
            [ 'column' => 'is_new', 'title' => 'Is New', 'type' => 'boolean', 'hiddenInList' => true  ],
            [ 'column' => 'gallery', 'title' => 'Gallery', 'type' => 'container', 'hiddenInList' => true,
                'child' => 'galleryImages', 'contentType' => 'images', 'fields' => ['thumbnail']],
            [ 'column' => 'tabs', 'title' => 'Info Tabs', 'type' => 'container', 'hiddenInList' => true ,
                'child' => 'tabs', 'contentType' => 'tabs', 'fields' => ['title', 'content']
            ],
            [ 'column' => 'upsells', 'title' => 'Upsell Products', 'type' => 'container', 'hiddenInList' => true ,
                'child' => 'upsells', 'contentType' => 'tabs', 'fields' => ['child_id']
            ],
        ];;
    }


}
