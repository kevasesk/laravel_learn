<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search\ElasticsearchRepository;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        $results = [];//TODO add search results
        $isAny = false;
        foreach ($results as $result){
            $isAny = $isAny || count($result);
        }
        return view('frontend.search.results', compact('results', 'isAny'));
    }
}
