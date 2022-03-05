<x-layouts.admin>
    <x-slot:title>
        Editing Product: {{ $product->name }}
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2> Editing Product: {{ $product->name }}</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.product.update', $product->id], 'method' => 'patch']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::select('brands', $brands , $product->brand_id , ['class' => 'form-select', 'data-control' => 'select2', 'data-placeholder' => 'Select a brand']) !!}
                            {!! Form::label('brands') !!}
                            @error('brands')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('name', old('name') ?? $product->name, ['class' => 'form-control', 'id' => 'name']) !!}
                            {!! Form::label('name') !!}
                            @error('name')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::textarea('description', old('description') ?? $product->description, ['class' => 'form-control', 'id' => 'description', 'style' => 'height:200px;']) !!}
                            {!! Form::label('description') !!}
                            @error('description')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            {!! Form::text('msrp', old('msrp') ?? $product->msrp, ['class' => 'form-control', 'id' => 'msrp']) !!}
                            {!! Form::label('msrp') !!}
                            @error('msrp')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Update Product" />
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_product">
                                Delete
                            </button>
                            @include('admin.partials.modals.delete-product')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
