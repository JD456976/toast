<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Deal;
use Illuminate\Contracts\Foundation\Application;

class SearchController extends Controller
{
    /**
     * @param SearchRequest $request
     * @return Application
     * |Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index(SearchRequest $request)
    {
        $results = Deal::search($request)->get();
        return view('frontend.search.index', compact('results', 'request'));
    }
}
