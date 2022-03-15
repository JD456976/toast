<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Bounty;

class BountyTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("Deal id", "deal_id")
                ->sortable(),
            Column::make("Product id", "product_id")
                ->sortable(),
            Column::make("Store id", "store_id")
                ->sortable(),
            Column::make("Brand id", "brand_id")
                ->sortable(),
            Column::make("Item name", "item_name")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Item url", "item_url")
                ->sortable(),
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
