<?php

namespace App\Http\Livewire;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PostCategoryTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Title")
                ->sortable()
                ->searchable(),
            Column::make("Featured")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return BlogCategory::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.post_category_table';
    }
}
