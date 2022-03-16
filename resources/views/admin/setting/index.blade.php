<x-layouts.admin>
    <x-slot:title>
        Site Settings
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <div class="form-floating mb-7">
                            <h2>Site Settings</h2>
                        </div>
                        {!! Form::open(['route' => ['admin.settings.update'], 'method' => 'put']) !!}
                        <h6 class="text-muted">Number of views before the "HOT" tag appears on deals</h6>
                        <div class="form-floating mb-7">
                            {!! Form::text('hot_days', old('hot_days') ?? settings()->get('hot_days'), ['class' => 'form-control', 'id' => 'hot_days']) !!}
                            {!! Form::label('Number of Views') !!}
                            @error('hot_days')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <h6 class="text-muted">Number of days for the "NEW" tag to appear on deals</h6>
                        <div class="form-floating mb-7">
                            {!! Form::text('new_days', old('new_days') ?? settings()->get('new_days') , ['class' => 'form-control', 'id' => 'new_days']) !!}
                            {!! Form::label('Number of Days') !!}
                            @error('new_days')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <h6 class="text-muted">Points awarded for posting a new deal</h6>
                        <div class="form-floating mb-7">
                            {!! Form::text('deal_points', old('deal_points') ?? settings()->get('deal_points') , ['class' => 'form-control', 'id' => 'deal_points']) !!}
                            {!! Form::label('Number of Points') !!}
                            @error('deal_points')
                            <x-admin.alert type="danger" :message="$message"/>
                            @enderror
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mb-7">
                            {!! Form::checkbox('is_active', '1', '',  ['id' => 'is_active', 'class' => 'form-check-input']) !!}
                            {!! Form::label('is_active', 'Is Active?', ['class' => 'form-check-label', 'for' => 'is_active']) !!}
                        </div>
                        <div class="mb-7">
                            <x-admin.button type="primary" text="Update Settings"/>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
