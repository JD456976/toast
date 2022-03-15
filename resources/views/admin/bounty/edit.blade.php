<x-layouts.admin>
    <x-slot:title>
        Editing Bounty: {{ $bounty->item_name }}
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Editing Bounty: {{ $bounty->item_name }}</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.bounty.update', $bounty->id], 'method' => 'patch']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::text('user_id', old('user_id') ?? $bounty->user_id, ['class' => 'form-control', 'id' => 'user_id']) !!}
                            {!! Form::label('Posted By') !!}
                            @error('user_id')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::select('stores', $stores , $bounty->store_id , ['class' => 'form-select', 'data-control' => 'select2', 'data-placeholder' => 'Select a store']) !!}
                            {!! Form::label('stores') !!}
                            @error('stores')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::select('brands', $brands , $bounty->brand_id , ['class' => 'form-select', 'data-control' => 'select2', 'data-placeholder' => 'Select a brand']) !!}
                            {!! Form::label('brands') !!}
                            @error('brands')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::select('products', $products , $bounty->product_id , ['class' => 'form-select', 'data-control' => 'select2', 'data-placeholder' => 'Select a product']) !!}
                            {!! Form::label('products') !!}
                            @error('products')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('item_name', old('item_name') ?? $bounty->item_name, ['class' => 'form-control', 'id' => 'item_name']) !!}
                            {!! Form::label('item_name') !!}
                            @error('item_name')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('item_url', old('discount') ?? $bounty->item_url, ['class' => 'form-control', 'id' => 'item_url']) !!}
                            {!! Form::label('item_url') !!}
                            @error('item_url')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('tags', old('tags') ?? $bounty->tagList, ['class' => 'form-control', 'id' => 'tags']) !!}
                            {!! Form::label('tags') !!}
                            @error('tags')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::textarea('description', old('description') ?? $bounty->description, ['class' => 'form-control', 'id' => 'description', 'style' => 'height:200px;']) !!}
                            {!! Form::label('description') !!}
                            @error('description')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            <div id="app">
                                <file-uploader
                                    :media="{{ $bounty->getMediaResource('bounties') }}"
                                    :unlimited="true"
                                    collection="bounties"
                                    :tokens="{{ json_encode(old('media', [])) }}"
                                    label="Upload Images"
                                    notes="Supported types: jpeg, png,jpg,gif"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"
                                ></file-uploader>
                            </div>
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::checkbox('is_active', '1', ($bounty->is_active == 1) ? true : false,  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                            {!! Form::label('is_active', 'Is Active?', ['class' => 'form-check-label', 'for' => 'is_active']) !!}

                            {!! Form::checkbox('is_featured', '1', ($bounty->is_featured == 1) ? true : false,  ['id' => 'is_featured', 'class' => 'form-check-input']) !!}
                            {!! Form::label('is_featured', 'Is Featured?', ['class' => 'form-check-label', 'for' => 'is_featured']) !!}
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Update Bounty"/>
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete_bounty">
                                Delete
                            </button>
                            @include('admin.partials.modals.delete-bounty')
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
