<x-layouts.app>
    <x-slot:title>
        Confirm Password
    </x-slot:title>
    <div class="container clearfix" style="max-width: 550px;">
        <h2>Confirm Password</h2>
        {!! Form::open(['url' => 'user/confirm-password', 'method' => 'post', 'class' => 'row mb-0']) !!}

        <div class="col-12 form-group">
            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            @error('password')
            <x-frontend.alert type="danger" :message="$message" />
            @enderror
        </div>

        <div class="col-12 form-group">
            <x-frontend.button text="Confirm Password" type="dark" />
        </div>
        {!! Form::close() !!}
    </div>
</x-layouts.app>
