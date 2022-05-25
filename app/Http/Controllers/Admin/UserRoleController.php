<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Inertia\Inertia;

class UserRoleController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return Inertia::render('Admin/Users/WithRoles', [
            'admins' => Role::admins(),
            'moderators' => Role::moderators(),
        ]);
    }
}
