<x-layouts.app>
    <x-slot:title>
        Login
    </x-slot:title>
    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
        <div class="row">
            <div class="col-lg-6 pr-30 d-none d-lg-block">
                <img class="border-radius-15" src="{{ asset('assets/frontend/imgs/page/login-1.png') }}" alt="" />
            </div>
            <div class="col-lg-6 col-md-8">
                <div class="login_wrap widget-taber-content background-white">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h1 class="mb-5">Login</h1>
                            <p class="mb-30">Don't have an account? <a href="{{ route('register') }}">Create here</a></p>
                        </div>
                        {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
                            <div class="form-group">
                                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
                                @error('email')
                                <x-frontend.alert type="danger" :message="$message" />
                                @enderror
                            </div>
                        <div class="form-group">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Your Password']) !!}
                            @error('password')
                            <x-frontend.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                            <div class="login_footer form-group mb-50">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        {!! Form::checkbox('remember', '1', null,  ['id' => 'remember', 'class' => 'form-check-input']) !!}
                                       {!! Form::label('remember', 'Remember', ['class' => 'form-check-label', 'for' => 'remember']) !!}
                                    </div>
                                </div>
                                <a class="text-muted" href="{{ url('forgot-password') }}">Forgot password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
