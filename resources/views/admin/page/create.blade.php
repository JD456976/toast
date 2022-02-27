<x-layouts.admin>
    <x-slot:title>
        Add New Site Page
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Add New Site Page</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.page.store'], 'method' => 'post']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'id' => 'title']) !!}
                            {!! Form::label('title') !!}
                            @error('title')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id' => 'content', 'style' => 'height:200px;']) !!}
                            {!! Form::label('content') !!}
                            @error('content')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'id' => 'slug']) !!}
                            {!! Form::label('slug') !!}
                            @error('slug')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::checkbox('is_active', '1', '',  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                            {!! Form::label('is_active', 'Is Active?', ['class' => 'form-check-label', 'for' => 'is_active']) !!}
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Add Page" />
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
