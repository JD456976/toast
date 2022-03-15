<x-livewire-tables::bs5.table.cell>
    <a href="{{ route('admin.bounty.edit', $row->id) }}">{{ $row->id }}</a>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <a href="{{ route('user.show',$row->user_id) }}">{{ $row->user->displayName() }}</a>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <a target="_blank" href="{{ route('deal.show', $row->deal->slug) }}">{{ $row->deal_id }}</a>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->item_name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->is_filled == 1)
        <span class="badge badge-success">Filled</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <a href="{{ route('user.show',$row->filled_id) }}">{{ $row->filled->displayName() }}</a>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->is_verified == 1)
        <span class="badge badge-success">Verified</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->is_active == 1)
        <span class="badge badge-success">Active</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->is_featured == 1)
        <span class="badge badge-warning">Featured</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->created_at->diffForHumans() }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->updated_at->diffForHumans() }}
</x-livewire-tables::bs5.table.cell>
