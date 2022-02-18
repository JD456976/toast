<x-layouts.app>
    <x-slot:title>
        Login
    </x-slot:title>
    <div class="container clearfix" style="max-width: 550px;">
            <h2>Login</h2>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            {!! Form::open(['route' => 'login', 'method' => 'post', 'class' => 'row mb-0']) !!}
                <div class="col-12 form-group">
                    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                    @error('email')
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
                    <x-frontend.button text="Login" type="dark" />
                    <a href="{{ url('forgot-password') }}" class="float-end">Forgot Password?</a>
                </div>
            {!! Form::close() !!}
            <h4>New Here?<a href="{{ route('register') }}"> Register </a>for an account</h4>
    </div>
</x-layouts.app>
