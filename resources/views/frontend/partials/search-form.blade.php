<div class="search-style-2">
    {!! Form::open(['route' => 'search', 'method' => 'post']) !!}
    	{!! Form::text('search', old('search'), ['placeholder' => 'Search for items...']) !!}
    {!! Form::close() !!}
    <div class="row">
        <div class="col-9">
            @error('search')
            <x-admin.alert type="danger" :message="$message" />
            @enderror
        </div>
    </div>
</div>
