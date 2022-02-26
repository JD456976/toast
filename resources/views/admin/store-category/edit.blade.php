<x-layouts.admin>
    <x-slot:title>
        Editing Store Category: {{ $storeCategory->name }}
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Editing Store Category: {{ $storeCategory->name }}</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.store-category.update', $storeCategory->id], 'method' => 'patch']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('parent_id', old('parent_id') ?? $storeCategory->parent_id, ['class' => 'form-control', 'id' => 'parent_id']) !!}
                            {!! Form::label('parent_id') !!}
                            @error('parent_id')
                            <x-frontend.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('name', old('name') ?? $storeCategory->name, ['class' => 'form-control', 'id' => 'name']) !!}
                            {!! Form::label('name') !!}
                            @error('name')
                            <x-frontend.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::textarea('description', old('description') ?? $storeCategory->description, ['class' => 'form-control', 'id' => 'description', 'style' => 'height:200px;']) !!}
                            {!! Form::label('description') !!}
                            @error('description')
                            <x-frontend.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('slug', old('slug') ?? $storeCategory->slug, ['class' => 'form-control', 'id' => 'slug']) !!}
                            {!! Form::label('slug') !!}
                            @error('slug')
                            <x-frontend.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="d-flex">
                            <x-admin.button type="primary" text="Update" />
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_store_category">
                                Delete
                            </button>
                            @include('admin.partials.modals.delete-store-category')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
