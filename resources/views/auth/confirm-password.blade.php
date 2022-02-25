<x-layouts.app>
    <x-slot:title>
        Confirm Password
    </x-slot:title>
    <div class="row">
        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h1 class="mb-5">Confirm Your Password</h1>
                                <p class="mb-30">Renter your password to continue</p>
                            </div>
                            {!! Form::open(['url' => 'user/confirm-password', 'method' => 'post']) !!}
                            <div class="form-group">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Your Password']) !!}
                                @error('password')
                                <x-frontend.alert type="danger" :message="$message"/>
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
