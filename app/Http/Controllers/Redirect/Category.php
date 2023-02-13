<?php

namespace App\Http\Controllers\Redirect;

use App\Models\Category as CategoryModel;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;

class Category
{
    public const SORT_MAPPING = [
        'Featured',
        'Lower to high price',
        'High to lower price'
    ];

    public static function process($id)
    {
        $category = CategoryModel::query()->where('id', '=', $id)->first();
        $categoryFilters = ProductModel::getCategoriesFilter();

        if($category){
            Session::put('current_category', $category);
            $filters = Session::get('filters') ?: [];
            $sort = Session::get('sort') ?? 0;
            $products = ProductModel::query();
           // var_dump($filters);//ysemenov

            $products->whereHas('categories', function ($query) use ($category, $filters) {
                $query->where('categories.id', $category->id);
                foreach ($filters as $name => $value) {
                    if (is_array($value)) {
                        $query->whereBetween($name, $value);
                    } else {
                        $query->where($name, $value);
                    }
                }
            });


            //sort
            if ($sort == 0) {
                $products->orderBy('id');
            }
            if ($sort == 1) {
                $products->orderBy('price', 'asc');
            }
            if ($sort == 2) {
                $products->orderBy('price', 'desc');
            }


            $sortValue = __(self::SORT_MAPPING[$sort]) ?? self::SORT_MAPPING[0];

            $products = $products->get();
            $brandFilters = [];
            $colorFilters = [];

            foreach ($products as $product) {
                $brandFilters[] = $product->brand;
            }
            $brandFilters = array_unique($brandFilters);

            foreach ($products as $product) {
                $colorFilters[$product->color] = $product->getColorData();
            }

            $totalCount = count($products);

            $chunkSize = Session::get('chunk') ?? 3;
            $chunks = $products->chunk($chunkSize);
            $page = request('page', 1);
            $currentChunk = $chunks->get($page - 1);
            $products = new LengthAwarePaginator($currentChunk, $products->count(), $chunkSize, null, [
                'path' => $category->url
            ]);

            $showingStart = ($page - 1) * $chunkSize + 1;
            $showingEnd = min($page * $chunkSize, $totalCount);

            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['title' => $category->title]
            ];

            return view('frontend.category.view', compact(
                'products',
                'category',
                'breadcrumbs',
                'filters',
                'categoryFilters',
                'brandFilters',
                'colorFilters',
                'totalCount',
                'showingStart',
                'showingEnd',
                'chunkSize',
                'sort',
                'sortValue'
            ));
        }
        return false;
    }
}
