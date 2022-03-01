<x-layouts.app>
    <x-slot:title>
        Reset Password
    </x-slot:title>
    <div class="row">
        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h1 class="mb-5">Reset Your Password</h1>
                                <p class="mb-30">Enter your information below to reset your password</p>
                            </div>
                            {!! Form::open(['url' => 'reset-password', 'method' => 'post']) !!}
                            {!! Form::hidden('token', request()->route('token')) !!}
                            <div class="form-group">
                                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Your Email']) !!}
                                @error('email')
                                <x-admin.alert type="danger" :message="$message"/>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Create a new password']) !!}
                                @error('password')
                                <x-admin.alert type="danger" :message="$message"/>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm your password']) !!}
                                @error('password_confirmation')
                                <x-admin.alert type="danger" :message="$message"/>
                                @enderror
                            </div>
                            <div class="form-group mb-30">
                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">Submit</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
