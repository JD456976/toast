<?php

namespace App\Http\Controllers;

use App\Http\Resources\RevisionResource;
use App\Http\Resources\StoreResource;
use App\Models\Deal;
use App\Models\Revision;
use App\Models\Store;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Stores/Index', [
            'top' => visits(Deal::class)->top(10),
            'topCats' => visits(Store::class)->top(10),
            'stores' => StoreResource::collection(Store::all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        $store = StoreResource::make(Store::showStore($id));
        $store->visit()->increment();

        return Inertia::render('Stores/Show', [
            'top' => visits(Deal::class)->top(10),
            'topCats' => visits(Store::class)->top(10),
            'store' => $store->load('deals'),
            //'initial' => round(Deal::where("slug", $slug)->first()->averageRating()),
            'media' => $store->getMedia('stores'),
            'audits' => RevisionResource::collection(Revision::dealRevisions()),
            //'reports' => ReportResource::collection(Report::dealReports($slug)),
            'views' => $store->visit()->count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
