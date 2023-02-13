<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FilterController extends \App\Http\Controllers\Controller
{
    public function add(Request $request)
    {
        $filters = Session::get('filters');

        if ($prices = $request->get('price')) {
            $filters['price'] = explode(',', $prices);
        }

        if ($brand = $request->get('brand')) {
            $filters['brand'] = $brand;
        }

        if ($color = $request->get('color')) {
            $filters['color'] = $color;
        }

        if($request->get('clear')) {
            $filters = [];
        }

        Session::put('filters', $filters);

        return back();
    }

    public function changeChunk(Request $request)
    {
        Session::put('chunk', $request->get('chunk'));
        return back();
    }

    public function changeSort(Request $request)
    {
        Session::put('sort', $request->get('sort'));
        return back();
    }


    public function remove(Request $request)
    {
        $filters = Session::get('filters');

        if ($request->get('price')) {
            unset($filters['price']);
        }

        if ($request->get('brand')) {
            unset($filters['brand']);
        }

        if ($request->get('color')) {
            unset($filters['color']);
        }

        Session::put('filters', $filters);

        return back();
    }
}
