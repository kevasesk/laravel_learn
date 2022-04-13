<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search\Posts\ElasticsearchRepository;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchModel = new ElasticsearchRepository();
        $query = $request->get('query');
        $results = $searchModel->search($query);
        return view('search.results', compact('results'));
    }
}