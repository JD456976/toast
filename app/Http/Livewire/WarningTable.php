<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Warn;

class WarningTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("User", "user_id")
                ->sortable(),
            Column::make("Staff", "staff_id")
                ->sortable(),
            Column::make("Reason", "reason")
                ->sortable(),
            Column::make("Content", "content")
                ->sortable(),
            Column::make("Expires", "expires")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Warn::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.warning_table';
    }
}
