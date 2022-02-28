<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Report;

class ReportTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make('User', 'user_id')
                ->sortable(),
            Column::make('Type', 'reportable_type')
                ->sortable(),
            Column::make('Reported ID', 'reportable_id')
                ->sortable(),
            Column::make('Reason')
                ->sortable()
                ->searchable(),
            Column::make('Comment')
                ->sortable()
                ->searchable(),
            Column::make('Status', 'is_resolved')
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Report::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.report_table';
    }
}
