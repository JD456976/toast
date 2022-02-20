<x-layouts.app>
    <x-slot:title>
        Register
    </x-slot:title>
    <div class="container clearfix">
        <div class="row justify-content-center">
            <div class="col-5">
                <h2>Register a New Account</h2>
                {!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'row mb-0']) !!}
                <div class="col-12 form-group">
                    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                    @error('email')
                    <x-frontend.alert type="danger" :message="$message" />
                    @enderror
                </div>

                <div class="col-12 form-group">
                    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    @error('name')
                    <x-frontend.alert type="danger" :message="$message" />
                    @enderror
                </div>

                <div class="col-12 form-group">
                    {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @error('password')
                    <x-frontend.alert type="danger" :message="$message" />
                    @enderror
                </div>

                <div class="col-12 form-group">
                    {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'control-label']) !!}
                    {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
                    @error('password_confirmation')
                    <x-frontend.alert type="danger" :message="$message" />
                    @enderror
                </div>

                <div class="col-12 form-group">
                    <x-button type="dark" text="Register" />
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-layouts.app>
