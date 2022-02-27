<x-layouts.admin>
    <x-slot:title>
        Editing User: {{ $user->displayName() }}
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2>Editing: {{ $user->displayName() }}</h2>
                            <div class="flex">
                                @if($user->is_banned == 1) <span class="badge badge-warning">Banned</span> @endif
                                @if(!empty($user->email_verified_at)) <span class="badge badge-info">Verified</span> @endif
                            </div>
                        </div>
                        {!! Form::open(['route' => ['admin.user.update', $user->id], 'method' => 'patch']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('name', old('name') ?? $user->name, ['class' => 'form-control', 'id' => 'name']) !!}
                            {!! Form::label('name') !!}
                            @error('name')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::email('email', old('email') ?? $user->email, ['class' => 'form-control', 'id' => 'email']) !!}
                            {!! Form::label('email') !!}
                            @error('email')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            <x-button type="primary" text="Update" />
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
