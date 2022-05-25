<x-layouts.app>
    <x-slot:title>
        Create New Deal
    </x-slot:title>
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Post New Deal</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <h4 class="mb-30">Deal Details</h4>
                        {!! Form::open(['route' => 'deal.store', 'method' => 'post']) !!}
                        <div class="row">
                            <div class="form-group col-lg-6">
                                {!! Form::select('products', $products, null, ['placeholder' => 'Select a product...', 'class' => 'form-control select-active']) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::select('brands', $brands, null, ['placeholder' => 'Select a brand...', 'class' => 'form-control select-active']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                {!! Form::select('stores', $stores, null, ['placeholder' => 'Select a store...', 'class' => 'form-control select-active']) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::text('tags', old('tags'), ['class' => 'form-control', 'placeholder' => 'Deal Tags']) !!}
                                @error('tags')
                                <x-admin.alert type="danger" :message="$message" />
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Deal Title']) !!}
                                @error('title')
                                <x-admin.alert type="danger" :message="$message" />
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => 'Deal Link']) !!}
                                @error('link')
                                <x-admin.alert type="danger" :message="$message" />
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                {!! Form::text('discount', old('discount'), ['class' => 'form-control', 'placeholder' => 'Discounted Price']) !!}
                                @error('discount')
                                <x-admin.alert type="danger" :message="$message" />
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => 'Regular Price']) !!}
                                @error('price')
                                <x-admin.alert type="danger" :message="$message" />
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                {!! Form::textarea('price_extras', old('price_extras'), ['class' => 'form-control', 'placeholder' => 'Price Extras']) !!}
                                @error('price_extras')
                                <x-admin.alert type="danger" :message="$message" />
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-30">
                            {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'Description','style' => 'height:300px;']) !!}
                            @error('description')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="border p-40 cart-totals ml-30 mb-50">
                        <div class="d-flex align-items-end justify-content-between mb-30">
                            <h4>Deal Images</h4>
                        </div>
                        <div id="app">
                            <file-uploader
                                :unlimited="true"
                                collection="deals"
                                :tokens="{{ json_encode(old('media', [])) }}"
                                label="Upload Images"
                                notes="Supported types: jpeg, png,jpg,gif"
                                accept="image/jpeg,image/png,image/jpg,image/gif"
                            ></file-uploader>
                        </div>
                    </div>
                    <div class="payment ml-30">
                        {!! Form::submit('Add Deal', ['class' => 'btn btn-fill-out btn-block mt-30']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </main>
</x-layouts.app>
