<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $columns = [
            'Id',
            'Title',
            'Url',
            'Is Active',
            'Parent ID',
            'Thumbnail',
        ];

        $entities = Category::all();

        $breadcrumbs = [
            ['url' => 'admin/categories', 'title' => 'Categories'],
        ];

        return view('admin.categories.list',[
            'columns' => $columns,
            'entities' => $entities,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entity = new Category();
        $breadcrumbs = [
            ['url' => 'admin/categories', 'title' => 'Categories'],
        ];
        return view('admin.categories.create', compact('entity', 'breadcrumbs'));
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
            $entity = new Category($data);
        }else{
            $entity = Category::query()->where('id','=', $request->id)->first();
            $entity->fill($data);
        }

        if($request->file('thumbnail')){
            $thumbnailPath = $request->file('thumbnail')->store('categories', 'public');
        }else{
            $thumbnailPath = $entity->thumbnail;
        }
        $entity->thumbnail = $thumbnailPath;
//        $entity->products()->detach();
//        $entity->products()->attach($data['products']);
        $entity->save();
        return redirect()->route('admin.categories.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entity = Category::query()->where('id','=', $id)->first();
        $breadcrumbs = [
            ['url' => 'admin/categories', 'title' => 'Categories'],
            [ 'title' => $entity->title],
        ];
        return view('admin.categories.create', compact('entity', 'breadcrumbs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entity = Category::query()->where('id','=', $id)->first();
        $entity->delete();
        return redirect()->route('admin.categories.list');

    }
}
