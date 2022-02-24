<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Role;

class RoleTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Id", "id"),
            Column::make('Name'),
            Column::make("Created at", "created_at"),
            Column::make("Updated at", "updated_at"),

        ];
    }

    public function query(): Builder
    {
        return Role::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.role_table';
    }
}
