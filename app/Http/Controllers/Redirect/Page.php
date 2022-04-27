<?php

namespace App\Http\Controllers\Redirect;

class Page
{
    public static function process($id)
    {
        $page = \App\Models\Page::query()->where('id', '=', $id)->first();
        if($page){
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['title' => $page->title]
            ];
            return view('frontend.page.template', compact('page', 'breadcrumbs'));
        }
        return false;
    }
}
