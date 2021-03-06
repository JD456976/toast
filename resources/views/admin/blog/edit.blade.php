<x-layouts.admin>
    <x-slot:title>
        Editing Blog: {{ $blog->title }}
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Editing Blog: {{ $blog->title }}</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.blog.update', $blog->id], 'method' => 'patch']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('title', old('title') ?? $blog->title, ['class' => 'form-control', 'id' => 'title']) !!}
                            {!! Form::label('title') !!}
                            @error('title')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::textarea('content', old('content') ?? $blog->content, ['class' => 'form-control', 'id' => 'content', 'style' => 'height:200px;']) !!}
                            @error('content')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::select('cat_id', $categories , $blog->cat_id , ['class' => 'form-select', 'data-control' => 'select2', 'data-placeholder' => 'Select a Category']) !!}
                            {!! Form::label('cat_id') !!}
                            @error('cat_id')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('tags', old('tags') ?? $blog->tagList, ['class' => 'form-control', 'id' => 'tags']) !!}
                            {!! Form::label('tags') !!}
                            @error('tags')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            <div id="app">
                                <file-uploader
                                    :media="{{ $blog->getMediaResource('blogs') }}"
                                    :unlimited="false"
                                    collection="blogs"
                                    :tokens="{{ json_encode(old('media', [])) }}"
                                    label="Upload Images"
                                    notes="Supported types: jpeg, png,jpg,gif"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"
                                ></file-uploader>
                            </div>
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::label('is_active', 'Is Active?', ['class' => 'form-check-label', 'for' => 'is_active']) !!}
                            {!! Form::checkbox('is_active', '1', ($blog->is_active == 1) ? true : false,  ['id' => 'is_active', 'class' => 'form-check-input']) !!}

                            {!! Form::label('is_featured', 'Is Featured?', ['class' => 'form-check-label', 'for' => 'is_featured']) !!}
                            {!! Form::checkbox('is_featured', '1', ($blog->is_featured == 1) ? true : false,  ['id' => 'is_featured', 'class' => 'form-check-input']) !!}
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Update Blog"/>
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete_post">
                                Delete
                            </button>
                            @include('admin.partials.modals.delete-post')
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
                .create(document.querySelector('#content'))
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/laravel-file-uploader"></script>
        <script>
            new Vue({
                el: '#app'
            })
        </script>
    @endpush
</x-layouts.admin>
