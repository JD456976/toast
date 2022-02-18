<x-layouts.app>
    <x-slot:title>
        Reset Password
    </x-slot:title>
    <div class="container clearfix" style="max-width: 550px;">
        <h2>Reset Password</h2>
        {!! Form::open(['url' => 'reset-password', 'method' => 'post', 'class' => 'row mb-0']) !!}
        {!! Form::hidden('token', request()->route('token')) !!}
        <div class="col-12 form-group">
            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            @error('email')
            <x-frontend.alert type="danger" :message="$message" />
            @enderror
        </div>

        <div class="col-12 form-group">
            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password',['class' => 'form-control']) !!}
            @error('password')
            <x-frontend.alert type="danger" :message="$message" />
            @enderror
        </div>

        <div class="col-12 form-group">
            {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            @error('password_confirmation')
            <x-frontend.alert type="danger" :message="$message" />
            @enderror
        </div>

        <div class="col-12 form-group">
            <x-frontend.button text="Reset Password" type="dark" />
        </div>
        {!! Form::close() !!}
    </div>
</x-layouts.app>
