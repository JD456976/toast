<x-layouts.admin>
    <x-slot:title>
        Editing Announcement: {{ $announcement->title }}
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Editing Announcement: {{ $announcement->title }}</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.announcement.update', $announcement->id], 'method' => 'patch']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('title', old('title') ?? $announcement->title, ['class' => 'form-control', 'id' => 'title']) !!}
                            {!! Form::label('title') !!}
                            @error('title')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::textarea('content', old('content') ?? $announcement->content, ['class' => 'form-control', 'id' => 'content', 'style' => 'height:300px;']) !!}
                            {!! Form::label('content') !!}
                            @error('content')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::select('type', $types , $announcement->type->value , ['class' => 'form-select', 'data-control' => 'select2', 'data-placeholder' => 'Select a type']) !!}
                            {!! Form::label('type') !!}
                            @error('type')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('expires', old('expires') ?? $announcement->expires, ['class' => 'form-control', 'id' => 'expires']) !!}
                            {!! Form::label('expires') !!}
                            @error('expires')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::checkbox('is_active', '1', ($announcement->is_active == 1) ? true : false,  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                            {!! Form::label('is_active', 'Is Active?', ['class' => 'form-check-label', 'for' => 'is_active']) !!}
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Update Announcement" />
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_announcement">
                                Delete
                            </button>
                            @include('admin.partials.modals.delete-announcement')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
