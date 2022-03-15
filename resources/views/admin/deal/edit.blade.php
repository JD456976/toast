<x-layouts.admin>
    <x-slot:title>
        Editing Deal: {{ $deal->title }}
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Editing Deal: {{ $deal->title }}</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.deal.update', $deal->id], 'method' => 'patch']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::select('stores', $stores , $deal->store_id , ['class' => 'form-select', 'data-control' => 'select2', 'data-placeholder' => 'Select a store']) !!}
                            {!! Form::label('stores') !!}
                            @error('stores')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::select('brands', $brands , $deal->brand_id , ['class' => 'form-select', 'data-control' => 'select2', 'data-placeholder' => 'Select a brand']) !!}
                            {!! Form::label('brands') !!}
                            @error('brands')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::select('products', $products , $deal->product_id , ['class' => 'form-select', 'data-control' => 'select2', 'data-placeholder' => 'Select a product']) !!}
                            {!! Form::label('products') !!}
                            @error('products')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('title', old('title') ?? $deal->title, ['class' => 'form-control', 'id' => 'title']) !!}
                            {!! Form::label('title') !!}
                            @error('title')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('discount', old('discount') ?? $deal->discount, ['class' => 'form-control', 'id' => 'discount']) !!}
                            {!! Form::label('discount') !!}
                            @error('discount')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('price', old('price') ?? $deal->price, ['class' => 'form-control', 'id' => 'price']) !!}
                            {!! Form::label('price') !!}
                            @error('price')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('price_extras', old('price_extras') ?? $deal->price_extras, ['class' => 'form-control', 'id' => 'price_extras']) !!}
                            {!! Form::label('price_extras') !!}
                            @error('price_extras')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('link', old('link') ?? $deal->link, ['class' => 'form-control', 'id' => 'link']) !!}
                            {!! Form::label('link') !!}
                            @error('link')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('tags', old('tags') ?? $deal->tagList, ['class' => 'form-control', 'id' => 'tags']) !!}
                            {!! Form::label('tags') !!}
                            @error('tags')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::textarea('description', old('description') ?? $deal->description, ['class' => 'form-control', 'id' => 'description', 'style' => 'height:200px;']) !!}
                            {!! Form::label('description') !!}
                            @error('description')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            <div id="app">
                                <file-uploader
                                    :media="{{ $deal->getMediaResource('deals') }}"
                                    :unlimited="true"
                                    collection="deals"
                                    :tokens="{{ json_encode(old('media', [])) }}"
                                    label="Upload Images"
                                    notes="Supported types: jpeg, png,jpg,gif"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"
                                ></file-uploader>
                            </div>
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::checkbox('is_active', '1', ($deal->is_active == 1) ? true : false,  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                            {!! Form::label('is_active', 'Is Active?', ['class' => 'form-check-label', 'for' => 'is_active']) !!}

                            {!! Form::checkbox('is_frontpage', '1', ($deal->is_frontpage == 1) ? true : false,  ['id' => 'is_frontpage', 'class' => 'form-check-input']) !!}
                            {!! Form::label('is_frontpage', 'On Frontpage?', ['class' => 'form-check-label', 'for' => 'is_frontpage']) !!}

                            {!! Form::checkbox('is_featured', '1', ($deal->is_featured == 1) ? true : false,  ['id' => 'is_featured', 'class' => 'form-check-input']) !!}
                            {!! Form::label('is_featured', 'Is Featured?', ['class' => 'form-check-label', 'for' => 'is_featured']) !!}
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Update Deal"/>
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete_deal">
                                Delete
                            </button>
                            @include('admin.partials.modals.delete-deal')
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
