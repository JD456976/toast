<x-layouts.app>
    <x-slot:title>
        Register
    </x-slot:title>
    <div class="row">
        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h1 class="mb-5">Create an Account</h1>
                                <p class="mb-30">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                            </div>
                            {!! Form::open(['route' => 'register', 'method' => 'post']) !!}
                                <div class="form-group">
                                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Your Name']) !!}
                                    @error('name')
                                    <x-admin.alert type="danger" :message="$message"/>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Your Email']) !!}
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
                                <div class="login_footer form-group mb-50">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            {!! Form::checkbox('tos', '1', null,  ['id' => 'tos', 'class' => 'form-check-input']) !!}
                                            {!! Form::label('tos', 'I agree to the Terms & Policy', ['class' => 'form-check-label', 'for' => 'tos']) !!}
                                            @error('tos')
                                            <x-admin.alert type="danger" :message="$message"/>
                                            @enderror
                                        </div>
                                    </div>
                                    <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                </div>
                                <div class="form-group mb-30">
                                    <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                </div>
                                <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pr-30 d-none d-lg-block">
                    <div class="card-login mt-115">
                        <a href="#" class="social-login facebook-login">
                            <img src="assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                            <span>Continue with Facebook</span>
                        </a>
                        <a href="#" class="social-login google-login">
                            <img src="assets/imgs/theme/icons/logo-google.svg" alt="" />
                            <span>Continue with Google</span>
                        </a>
                        <a href="#" class="social-login apple-login">
                            <img src="assets/imgs/theme/icons/logo-apple.svg" alt="" />
                            <span>Continue with Apple</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
