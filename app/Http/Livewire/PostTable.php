<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PostTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Posted By", "user_id")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable()
                ->searchable(),
            Column::make("Active?", "is_active")
                ->sortable(),
            Column::make("Featured?", "is_featured")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Blog::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.post_table';
    }
}
