<x-layouts.admin>
    <x-slot:title>
        Add Announcement
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Add Announcement</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.announcement.store'], 'method' => 'post']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'id' => 'title']) !!}
                            {!! Form::label('title') !!}
                            @error('title')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id' => 'content', 'style' => 'height:300px;']) !!}
                            {!! Form::label('content') !!}
                            @error('content')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::select('type', $types , null , ['class' => 'form-select', 'data-control' => 'select2', 'data-placeholder' => 'Select a type']) !!}
                            {!! Form::label('type') !!}
                            @error('type')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('expires', old('expires'), ['class' => 'form-control', 'id' => 'expires']) !!}
                            {!! Form::label('expires') !!}
                            @error('expires')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::checkbox('is_active', '1', '',  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                            {!! Form::label('is_active', 'Is Active?', ['class' => 'form-check-label', 'for' => 'is_active']) !!}
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Add Announcement" />
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
