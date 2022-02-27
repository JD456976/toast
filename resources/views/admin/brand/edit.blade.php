<x-layouts.admin>
    <x-slot:title>
        Editing Brand: {{ $brand->name }}
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Editing Brand: {{ $brand->name }}</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.brand.update', $brand->id], 'method' => 'patch']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('name', old('name') ?? $brand->name, ['class' => 'form-control', 'id' => 'name']) !!}
                            {!! Form::label('name') !!}
                            @error('name')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::textarea('description', old('description') ?? $brand->description, ['class' => 'form-control', 'id' => 'description', 'style' => 'height:200px;']) !!}
                            {!! Form::label('description') !!}
                            @error('description')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('slug', old('slug') ?? $brand->slug, ['class' => 'form-control', 'id' => 'slug']) !!}
                            {!! Form::label('slug') !!}
                            @error('slug')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::checkbox('is_featured', '1', ($brand->is_featured == 1) ? true : false,  ['id' => 'is_featured', 'class' => 'form-check-input']) !!}
                            {!! Form::label('is_featured', 'Is Featured?', ['class' => 'form-check-label', 'for' => 'is_featured']) !!}
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Update Brand" />
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_brand">
                                Delete
                            </button>
                            @include('admin.partials.modals.delete-brand')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
