<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Role;

class UserRoleTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make("Name", )
                ->sortable(),
            Column::make('Role'),
        ];
    }

    public function query(): Builder
    {
        return User::query()
            ->whereRoleIs('admin')
            ->orWhereRoleIs('moderator');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.user_role_table';
    }
}
