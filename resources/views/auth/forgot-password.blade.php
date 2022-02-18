<x-layouts.app>
    <x-slot:title>
        Forgot Password
    </x-slot:title>
    <div class="container clearfix" style="max-width: 550px;">
        <h2>Forgot Password</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        {!! Form::open(['url' => 'forgot-password', 'method' => 'post', 'class' => 'row mb-0']) !!}
        <div class="col-12 form-group">
            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            @error('email')
            <x-frontend.alert type="danger" :message="$message" />
            @enderror
        </div>

        <div class="col-12 form-group">
            <x-frontend.button text="Reset Password" type="dark" />
        </div>
        {!! Form::close() !!}
    </div>
</x-layouts.app>
