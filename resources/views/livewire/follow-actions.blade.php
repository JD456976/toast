<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home"
             role="tabpanel" aria-labelledby="home-tab">
            @if (count($user->following) == 0)
                <h5>You are not currently following anyone</h5>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Start Following</th>
                            <th>Actions</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($user->following as $follow)
                            <tr>
                                <td>
                                    <a href="{{ route('user.show', $follow->follow->id) }}">{{ $follow->follow->displayName() }}</a>
                                </td>
                                <td>@humandate($follow->created_at)</td>
                                <td>@if ($follow->is_active == 1)
                                        <button wire:click="unfollow({{$follow->id}})" class="btn">Unfollow</button>
                                    @else
                                        <button wire:click="follow({{$follow->id}})" class="btn">Follow</button>
                                    @endif
                                </td>
                                <td>
                                    <button wire:click="deleteConfirm({{$follow->id}})" class="btn">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel"
             aria-labelledby="profile-tab">
            @if (count($user->followed) == 0)
                <h5>No one is currently following you. </h5>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Started Following</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($user->followed as $follow)
                            <tr>
                                <td>
                                    <a href="{{ route('user.show', $follow->follow->id) }}">{{ $follow->follow->displayName() }}</a>
                                </td>
                                <td>@humandate($follow->created_at)</td>
                            </tr>
                        @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
        </div>
    </div>
</div>
