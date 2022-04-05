<x-layouts.app>
    <x-slot:title>
        {{ $user->displayName() }}'s Account
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
                                               aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="deals-tab" data-bs-toggle="tab" href="#deals"
                                               role="tab" aria-controls="deals" aria-selected="false"><i
                                                    class="fi-rs-shopping-bag mr-10"></i>Your Deals</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="bounties-tab" data-bs-toggle="tab" href="#bounties"
                                               role="tab" aria-controls="bounties" aria-selected="false"><i
                                                    class="fi-rs-shopping-cart-check mr-10"></i>Your Bounties</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="notifications-tab" data-bs-toggle="tab"
                                               href="#notifications"
                                               role="tab" aria-controls="notifications" aria-selected="true"><i
                                                    class="fi-rs-marker mr-10"></i>Notifications</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="following-tab" data-bs-toggle="tab"
                                               href="#following"
                                               role="tab" aria-controls="following" aria-selected="true"><i
                                                    class="fi-rs-marker mr-10"></i>Following</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                                               href="#account-detail" role="tab" aria-controls="account-detail"
                                               aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="page-login.html"><i
                                                    class="fi-rs-sign-out mr-10"></i>Logout</a>
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
                                                <h3 class="mb-0">Hello {{ $currentUser->displayName() }}!</h3>
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    From your account dashboard. you can easily check &amp; view your <a
                                                        href="#">recent orders</a>,<br/>
                                                    manage your <a href="#">shipping and billing addresses</a> and <a
                                                        href="#">edit your password and account details.</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="deals" role="tabpanel" aria-labelledby="deals-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Your Deals</h3>
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
                                                <h3 class="mb-0">Your Bounties</h3>
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
                                                                <th>Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($user->unreadNotifications as $notification)
                                                                <tr>
                                                                    <td>@humandate($notification->created_at)</td>
                                                                    <td>{{ Str::of($notification->type)->after('App\Notifications\\') }}</td>
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
                                                                <th>Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($user->notifications as $notification)
                                                                <tr>
                                                                    <td>@humandate($notification->created_at)</td>
                                                                    <td>{{ Str::of($notification->type)->after('App\Notifications\\') }}</td>
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
                                            <div class="card-header">
                                                <h3 class="mb-0">Your Follow Lists</h3>
                                            </div>
                                            <div class="card-body">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="home-tab"
                                                                data-bs-toggle="tab" data-bs-target="#home"
                                                                type="button" role="tab"
                                                                aria-controls="home" aria-selected="true">
                                                            Following
                                                        </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="profile-tab"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#profile" type="button"
                                                                role="tab" aria-controls="profile"
                                                                aria-selected="false">Followers
                                                        </button>
                                                    </li>
                                                </ul>
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
                                    <div class="tab-pane fade" id="account-detail" role="tabpanel"
                                         aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Account Details</h5>
                                            </div>
                                            <div class="card-body">
                                                {!! Form::open(['route' => ['user.update', $currentUser->id], 'method' => 'patch']) !!}
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                                                        {!! Form::text('name', old('name') ?? $user->displayName(), ['class' => 'form-control']) !!}
                                                        @error('name')
                                                        <x-admin.alert type="danger" :message="$message"/>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                                                        {!! Form::email('email', old('email') ?? $user->email, ['class' => 'form-control']) !!}
                                                        @error('email')
                                                        <x-admin.alert type="danger" :message="$message"/>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {!! Form::label('current_password', 'Current Password', ['class' => 'control-label']) !!}
                                                        {!! Form::password('current_password', ['class' => 'form-control']) !!}
                                                        @error('current_password')
                                                        <x-admin.alert type="danger" :message="$message"/>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {!! Form::label('new_password', 'New Password', ['class' => 'control-label']) !!}
                                                        {!! Form::password('new_password', ['class' => 'form-control']) !!}
                                                        @error('new_password')
                                                        <x-admin.alert type="danger" :message="$message"/>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {!! Form::label('new_password_confirmation', 'Confirm New Password', ['class' => 'control-label']) !!}
                                                        {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
                                                        @error('new_password_confirmation')
                                                        <x-admin.alert type="danger" :message="$message"/>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <div id="app">
                                                            <file-uploader
                                                                :media="{{ $user->getMediaResource('avatars') }}"
                                                                :unlimited="false"
                                                                collection="avatars"
                                                                :tokens="{{ json_encode(old('media', [])) }}"
                                                                label="Upload Avatar"
                                                                notes="Supported types: jpeg, png,jpg,gif"
                                                                accept="image/jpeg,image/png,image/jpg,image/gif"
                                                            ></file-uploader>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        {!! Form::submit('Save Changes', ['class' => 'btn btn-fill-out submit font-weight-bold w-50']) !!}
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-danger mt-20"
                                                            data-bs-toggle="modal" data-bs-target="#delete_account">
                                                        Delete Account
                                                    </button>
                                                    @include('frontend.partials.modals.delete-account')
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
