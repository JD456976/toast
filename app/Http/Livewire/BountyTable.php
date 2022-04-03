<?php

namespace App\Http\Livewire;

use App\Models\Bounty;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class BountyTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Posted by", "user_id")
                ->sortable(),
            Column::make("Deal id", "deal_id")
                ->sortable(),
            Column::make("Item name", "item_name")
                ->sortable()
                ->searchable(),
            Column::make("Is filled", "is_filled")
                ->sortable(),
            Column::make("Filled id", "filled_id")
                ->sortable(),
            Column::make("Is verified", "is_verified")
                ->sortable(),
            Column::make("Is active", "is_active")
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
        return Bounty::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.bounty_table';
    }
}
