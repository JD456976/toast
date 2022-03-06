<x-livewire-tables::bs5.table.cell>
    <a href="{{ route('admin.page.edit', $row->id) }}">{{ $row->id }}</a>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->slug }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ Str::words($row->content, 15) }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->is_active == 1)
        <span class="badge badge-success">Active</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->footer_menu == 1)
        <span class="badge badge-success">Active</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->header_menu == 1)
        <span class="badge badge-success">Active</span>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->created_at->diffForHumans() }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->updated_at->diffForHumans() }}
</x-livewire-tables::bs5.table.cell>
