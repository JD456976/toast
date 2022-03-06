<x-layouts.admin>
    <x-slot:title>
        Editing Page: {{ $page->title }}
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Editing Page: {{ $page->title }}</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.page.update', $page->id], 'method' => 'patch']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('title', old('title') ?? $page->title, ['class' => 'form-control', 'id' => 'title']) !!}
                            {!! Form::label('title') !!}
                            @error('title')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::textarea('content', old('content') ?? $page->content, ['class' => 'form-control', 'id' => 'content', 'style' => 'height:200px;']) !!}
                            @error('content')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::label('is_active', 'Is Active?', ['class' => 'form-check-label', 'for' => 'is_active']) !!}
                            {!! Form::checkbox('is_active', '1', ($page->is_active == 1) ? true : false,  ['id' => 'is_active', 'class' => 'form-check-input']) !!}

                            {!! Form::label('footer_menu', 'Footer Menu?', ['class' => 'form-check-label', 'for' => 'footer_menu']) !!}
                            {!! Form::checkbox('footer_menu', '1', ($page->footer_menu == 1) ? true : false,  ['id' => 'footer_menu', 'class' => 'form-check-input']) !!}

                            {!! Form::label('header_menu', 'Header Menu?', ['class' => 'form-check-label', 'for' => 'header_menu']) !!}
                            {!! Form::checkbox('header_menu', '1', ($page->header_menu == 1) ? true : false,  ['id' => 'header_menu', 'class' => 'form-check-input']) !!}
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Update Page" />
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_page">
                                Delete
                            </button>
                            @include('admin.partials.modals.delete-page')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('footer-scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#content' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    @endpush
</x-layouts.admin>
