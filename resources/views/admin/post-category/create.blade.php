<x-layouts.admin>
    <x-slot:title>
        Add New Post Category
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Add New Post Category</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.post-category.store'], 'method' => 'post']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'id' => 'title']) !!}
                            {!! Form::label('title') !!}
                            @error('title')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::label('is_featured', 'Is Featured?', ['class' => 'form-check-label', 'for' => 'is_featured']) !!}
                            {!! Form::checkbox('is_featured', '1', '',  ['id' => 'is_featured', 'class' => 'form-check-input']) !!}
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Add Post Category"/>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
