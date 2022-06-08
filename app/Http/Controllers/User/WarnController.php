<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\WarnResource;
use App\Models\Warn;
use Inertia\Inertia;

class WarnController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Warnings/Index', [
            'warnings' => WarnResource::collection(Warn::userWarns())
        ]);
    }

    public function show($id)
    {
        return Inertia::render('Account/Warnings/Show', [
            'warn' => WarnResource::make(Warn::showWarn($id)->first()),
        ]);
    }
}
