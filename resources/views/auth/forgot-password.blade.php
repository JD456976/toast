<x-layouts.app>
    <x-slot:title>
        Forgot Password
    </x-slot:title>
    <div class="row">
        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 mb-2">
                                <h1 class="mb-5">Forgot Password</h1>
                                <p>Enter the email address associated with your account below</p>
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            {!! Form::open(['url' => 'forgot-password', 'method' => 'post']) !!}
                            <div class="form-group">
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Your Email']) !!}
                                @error('email')
                                <x-admin.alert type="danger" :message="$message"/>
                                @enderror
                            </div>
                            <div class="form-group mb-30">
                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
