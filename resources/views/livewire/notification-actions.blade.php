<div>
    <div class="tab-pane fade" id="notifications" role="tabpanel"
         aria-labelledby="notifications-tab">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Your Notifications</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        @if (count($user->unreadNotifications) == 0)
                            <h5>No New Notifications to Display</h5>
                        @else
                            <h5>New Notifications</h5>
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Item Name</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($user->unreadNotifications as $notification)
                                <tr>
                                    <td>@humandate($notification->created_at)</td>
                                    <td>{{ $notification->data['title'] }}</td>
                                    <td>{{ $notification->data['item_name'] }}</td>
                                    <td>
                                        @if (Str::contains('App\Notifications\BountyFilled', $notification->type))
                                            <a href="{{ route('bounty.show', $notification->data['slug']) }}"
                                               class="btn-small d-block">View</a>
                                        @elseif (Str::contains('App\Notifications\NewDeal', $notification->type))
                                            <a href="{{ route('deal.show', $notification->data['slug']) }}"
                                               class="btn-small d-block">View</a>
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click="markRead({{$notification->id}})" class="btn btn-sm">Mark As
                                            Read
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        @if (count($user->notifications) == 0)
                            <h5>No Read Notifications to Display</h5>
                        @else
                            <h5>All Notifications</h5>
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Item Name</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($user->notifications as $notification)
                                <tr>
                                    <td>@humandate($notification->created_at)</td>
                                    <td>{{ $notification->data['title'] }}</td>
                                    <td>{{ $notification->data['item_name'] }}</td>
                                    <td>
                                        @if (Str::contains('App\Notifications\BountyFilled', $notification->type))
                                            <a href="{{ route('bounty.show', $notification->data['slug']) }}"
                                               class="btn-small d-block">View</a>
                                        @elseif (Str::contains('App\Notifications\NewDeal', $notification->type))
                                            <a href="{{ route('deal.show', $notification->data['slug']) }}"
                                               class="btn-small d-block">View</a>
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click="deleteNotification({{$notification->id}})"
                                                class="btn btn-sm">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
