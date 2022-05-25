<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    public static function admins(): mixed
    {
        return User::whereRoleIs('admin')->get();
    }

    public static function moderators(): mixed
    {
        return User::whereRoleIs('moderator')->get();
    }
}
