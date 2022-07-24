<?php

namespace App\Http\Controllers;


use App\Models\Deal;
use App\Models\View;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function __invoke()
    {
        $deals = Deal::all();

        foreach ($deals as $deal) {
            $view = View::firstOrNew(
                ['viewable_id' => $deal->id],
                ['viewable_type' => Deal::class],
                ['user_id' => Auth::id()]
            );
            $view->user_id = Auth::id();
            $view->viewable_id = $deal->id;
            $view->viewable_type = Deal::class;
            $view->save();
        }
        return back()->with('success', 'NEW tags cleared');
    }
}
