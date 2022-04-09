<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $columns = [
            'Id',
            'Sku',
            'Title',
            'Url',
            'Price',
            'Qty',
            'Is In Stock',
            'Is Active',
            'Thumbnail',
        ];

        $products = Product::all();
        $breadcrumbs = [
            ['url' => 'admin/products', 'title' => 'Products']
        ];

        return view('admin.products.list', compact('columns', 'products', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('admin.products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'is_active' => 'required',
            'thumbnail' => 'image|max:20000',
        ]);

        if(!$request->id){
            $product = new Product($data);
        }else{
            $product = Product::query()->where('id','=', $request->id)->first();
            $product->fill($data);
        }

        if($request->file('thumbnail')){
            $thumbnailPath = $request->file('thumbnail')->store('products', 'public');
        }else{
            $thumbnailPath = $product->thumbnail;
        }
        $product->thumbnail = $thumbnailPath;
        $product->categories()->detach();
        $product->categories()->attach($data['categories']);
        $product->save();
        return redirect()->route('admin.products.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::query()->where('id','=', $id)->first();
        $breadcrumbs = [
            ['url' => 'admin/products', 'title' => 'Products'],
            ['title' => $product->title],
        ];
        return view('admin.products.create', compact('product', 'breadcrumbs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::query()->where('id','=', $id)->first();
        $product->delete();
        return redirect()->route('admin.products.list');

    }
}
