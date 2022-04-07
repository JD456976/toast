<x-layouts.app>
    <x-slot:title>
        {{ $user->displayName() }}'s Page
    </x-slot:title>
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab"
                                               href="#dashboard" role="tab" aria-controls="dashboard"
                                               aria-selected="false"><i
                                                    class="fi-rs-settings-sliders mr-10"></i>Activity</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="deals-tab" data-bs-toggle="tab" href="#deals"
                                               role="tab" aria-controls="deals" aria-selected="false"><i
                                                    class="fi-rs-shopping-bag mr-10"></i>
                                                Deals</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="bounties-tab" data-bs-toggle="tab" href="#bounties"
                                               role="tab" aria-controls="bounties" aria-selected="false"><i
                                                    class="fi-rs-shopping-cart-check mr-10"></i>Bounties</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="following-tab" data-bs-toggle="tab"
                                               href="#following"
                                               role="tab" aria-controls="following" aria-selected="true"><i
                                                    class="fi-rs-marker mr-10"></i>Follow Lists</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content account dashboard-content pl-50">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                         aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Welcome to {{ $user->displayName() }}'s Page!</h3>
                                            </div>
                                            <div class="card-body">
                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="pills-home-tab"
                                                                data-bs-toggle="pill" data-bs-target="#pills-home"
                                                                type="button" role="tab" aria-controls="pills-home"
                                                                aria-selected="true">Home
                                                        </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-profile-tab"
                                                                data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                                type="button" role="tab" aria-controls="pills-profile"
                                                                aria-selected="false">Profile
                                                        </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-contact-tab"
                                                                data-bs-toggle="pill" data-bs-target="#pills-contact"
                                                                type="button" role="tab" aria-controls="pills-contact"
                                                                aria-selected="false">Contact
                                                        </button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-home"
                                                         role="tabpanel" aria-labelledby="pills-home-tab">...
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                         aria-labelledby="pills-profile-tab">...
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                                         aria-labelledby="pills-contact-tab">...
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="deals" role="tabpanel" aria-labelledby="deals-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">{{ $user->displayName() }}'s Deals</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        @if (count($user->deals) == 0)
                                                            <h5>No Deals to Display</h5>
                                                        @else
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Posted</th>
                                                                <th>Status</th>
                                                                <th>Title</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($user->deals as $deal)
                                                                <tr>
                                                                    <td>{{ $deal->id }}</td>
                                                                    <td>{{ $deal->createdAt() }}</td>
                                                                    <td>
                                                                        @if ($deal->is_active == 1)
                                                                            <span class="badge bg-success">Active</span>
                                                                        @else
                                                                            <span
                                                                                class="badge bg-danger">Inactive</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $deal->title }}</td>
                                                                    <td><a href="{{ route('deal.show', $deal->slug) }}"
                                                                           class="btn-small d-block">View</a></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        @endif
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="bounties" role="tabpanel"
                                         aria-labelledby="bounties-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">{{ $user->displayName() }}'s Bounties</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        @if (count($user->bounties) == 0)
                                                            <h5>No Bounties to Display</h5>
                                                        @else
                                                            <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($user->bounties as $bounty)
                                                                <tr>
                                                                    <td>{{ $bounty->id }}</td>
                                                                    <td>{{ $bounty->createdAt() }}</td>
                                                                    <td>
                                                                        @if ($bounty->is_active == 1)
                                                                            <span class="badge bg-success">Active</span>
                                                                        @else
                                                                            <span
                                                                                class="badge bg-danger">Inactive</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $bounty->item_name }}</td>
                                                                    <td>
                                                                        <a href="{{ route('bounty.show', $bounty->slug) }}"
                                                                           class="btn-small d-block">View</a></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        @endif
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="following" role="tabpanel"
                                         aria-labelledby="following-tab">
                                        <div class="card">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-following-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-following"
                                                            type="button" role="tab" aria-controls="pills-following"
                                                            aria-selected="true">Following
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-followers-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-followers"
                                                            type="button" role="tab" aria-controls="pills-followers"
                                                            aria-selected="false">Followers
                                                    </button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-following"
                                                     role="tabpanel"
                                                     aria-labelledby="pills-following-tab">
                                                    @if (count($user->following) == 0)
                                                        <h5>No one to display</h5>
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
                                                                                <a href="{{ route('unfollow.user',$follow->id) }}">
                                                                                    <button
                                                                                        class="btn btn-sm btn-primary">
                                                                                        Unfollow
                                                                                    </button>
                                                                                </a>
                                                                            @else
                                                                                <a href="{{ route('follow.user', $follow->id) }}">
                                                                                    <button
                                                                                        class="btn btn-sm btn-primary">
                                                                                        Follow
                                                                                    </button>
                                                                                </a>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            {!! Form::open(['route' => ['follow.destroy', $follow->id], 'method' => 'delete']) !!}
                                                                            {!! Form::submit('Remove', ['class' => 'btn btn-sm btn-danger']) !!}
                                                                            {!! Form::close() !!}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                @endif
                                                            </table>
                                                        </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-followers" role="tabpanel"
                                                     aria-labelledby="pills-followers-tab">@if (count($user->followed) == 0)
                                                        <h5>No followers to display </h5>
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
                                                                @foreach ($user->followed as $follow)
                                                                    <tr>
                                                                        <td>
                                                                            <a href="{{ route('user.show', $follow->follow->id) }}">{{ $follow->follow->displayName() }}</a>
                                                                        </td>
                                                                        <td>@humandate($follow->created_at)</td>
                                                                        <td>@if ($follow->is_active == 1)
                                                                                <a href="{{ route('unfollow.user',$follow->id) }}">
                                                                                    <button
                                                                                        class="btn btn-sm btn-primary">
                                                                                        Unfollow
                                                                                    </button>
                                                                                </a>
                                                                            @else
                                                                                <a href="{{ route('follow.user', $follow->id) }}">
                                                                                    <button
                                                                                        class="btn btn-sm btn-primary">
                                                                                        Follow
                                                                                    </button>
                                                                                </a>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            {!! Form::open(['route' => ['follow.destroy', $follow->id], 'method' => 'delete']) !!}
                                                                            {!! Form::submit('Remove', ['class' => 'btn btn-sm btn-danger']) !!}
                                                                            {!! Form::close() !!}
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>
