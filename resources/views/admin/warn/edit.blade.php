<x-layouts.admin>
    <x-slot:title>
        Edit Warning For: {{ $warn->user->displayName() }}
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2>Editing Warning For: {{ $warn->user->displayName() }}</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.warn.update', $warn->id], 'method' => 'patch']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('reason', old('reason') ?? $warn->reason, ['class' => 'form-control', 'id' => 'reason']) !!}
                            {!! Form::label('reason') !!}
                            @error('reason')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::textarea('content', old('content') ?? $warn->content, ['class' => 'form-control', 'id' => 'content', 'style' => 'height:300px;']) !!}
                            {!! Form::label('content') !!}
                            @error('content')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('expires', old('expires') ?? $warn->expires, ['class' => 'form-control', 'id' => 'expires']) !!}
                            {!! Form::label('expires') !!}
                            @error('expires')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                           <x-admin.button type="primary" text="Update" />
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
