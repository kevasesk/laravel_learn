<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search\ElasticsearchRepository;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchModel = new ElasticsearchRepository();
        $query = $request->get('query');
        $results = $searchModel->search($query);
        $isAny = false;
        foreach ($results as $result){
            $isAny = $isAny || count($result);
        }
        return view('frontend.search.results', compact('results', 'isAny'));
    }
}
