<x-layouts.admin>
    <x-slot:title>
        Editing Blog Category: {{ $blogCategory->title }}
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Editing Blog Category: {{ $blogCategory->title }}</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.blog-category.update', $blogCategory->id], 'method' => 'patch']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('title', old('title') ?? $blogCategory->title, ['class' => 'form-control', 'id' => 'title']) !!}
                            {!! Form::label('title') !!}
                            @error('title')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            <div id="app">
                                <file-uploader
                                    :media="{{ $blogCategory->getMediaResource('blog-categories') }}"
                                    :unlimited="false"
                                    collection="blog-categories"
                                    :tokens="{{ json_encode(old('media', [])) }}"
                                    label="Upload Images"
                                    notes="Supported types: jpeg, png,jpg,gif"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"
                                ></file-uploader>
                            </div>
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::label('is_featured', 'Is Featured?', ['class' => 'form-check-label', 'for' => 'is_featured']) !!}
                            {!! Form::checkbox('is_featured', '1', ($blogCategory->is_featured == 1) ? true : false,  ['id' => 'is_featured', 'class' => 'form-check-input']) !!}
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Update Blog Category"/>
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete_post_category">
                                Delete
                            </button>
                            @include('admin.partials.modals.delete-post-category')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('footer-scripts')
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/laravel-file-uploader"></script>
        <script>
            new Vue({
                el: '#app'
            })
        </script>
    @endpush
</x-layouts.admin>
