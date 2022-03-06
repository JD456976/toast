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
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::checkbox('is_active', '1', '',  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                            {!! Form::label('is_active', 'Is Active?', ['class' => 'form-check-label', 'for' => 'is_active']) !!}

                            {!! Form::checkbox('footer_menu', '1', '',  ['id' => 'footer_menu', 'class' => 'form-check-input']) !!}
                            {!! Form::label('footer_menu', 'Footer Menu?', ['class' => 'form-check-label', 'for' => 'footer_menu']) !!}

                            {!! Form::checkbox('header_menu', '1', '',  ['id' => 'header_menu', 'class' => 'form-check-input']) !!}
                            {!! Form::label('header_menu', 'Header Menu?', ['class' => 'form-check-label', 'for' => 'header_menu']) !!}
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
