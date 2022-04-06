<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
    public function index()
    {
        $columns = [
            'Id',
            'Is Active',
            'Title',
            'Url',
            'Content',
        ];

        $pages = Page::all();

        return view('admin.pages.index',[
            'columns' => $columns,
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page();
        return view('admin.pages.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'is_active' => 'required',
        ]);

        if(!$request->id){
            $page = new Page();
        }else{
            $page = Page::query()->where('id','=', $request->id)->first();
        }

        $page->title = $request->title;
        $page->content = $request->get('content') ?? '' ;
        $page->url = $request->url;
        $page->is_active = $request->is_active;
        $page->save();
        return redirect()->route('admin.pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::query()->where('id','=', $id)->first();
        return view('admin.pages.create', compact('page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::query()->where('id','=', $id)->first();
        $page->delete();
        return redirect()->route('admin.pages.index');

    }
}
