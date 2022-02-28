<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Deal;

class DealTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Product id", "product_id")
                ->sortable(),
            Column::make("Store id", "store_id")
                ->sortable(),
            Column::make("Brand id", "brand_id")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("Approver id", "approver_id")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Discount", "discount")
                ->sortable(),
            Column::make("Price", "price")
                ->sortable(),
            Column::make("Price extras", "price_extras")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Url", "url")
                ->sortable(),
            Column::make("Slug", "slug")
                ->sortable(),
            Column::make("Is active", "is_active")
                ->sortable(),
            Column::make("Is frontpage", "is_frontpage")
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
        return Deal::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.deal_table';
    }
}
