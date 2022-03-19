<x-layouts.app>
    <x-slot:title>
        Your Point History
    </x-slot:title>
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Your Point History</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Points</th>
                        <th>For</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($points as $point)
                        <tr>
                            <td>{{ $point->id }}</td>
                            <td>{{ $point->createdAt() }}</td>
                            <td>{{ $point->points }}</td>
                            <td>
                                @if ($point->pointable_type == 'App\Models\Deal')
                                    Deal
                                @else
                                    Bounty
                                @endif
                            </td>
                            <td>
                                @if ($point->pointable_type == 'App\Models\Deal')
                                    <a href="{{ route('deal.show', $point->deal->slug) }}" class="btn-small d-block">View</a>
                                @else
                                    <a href="{{ route('bounty.show', $point->bounty->slug) }}"
                                       class="btn-small d-block">View</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
