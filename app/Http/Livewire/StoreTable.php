<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Store;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class StoreTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Slug", "slug")
                ->sortable(),
            Column::make("Is featured", "is_featured")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Store::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.store_table';
    }
}
