<x-layouts.app>
    <x-slot:title>
        Verify Your Email
    </x-slot:title>
    <div class="row">
        <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h1 class="mb-5">Verify Your Email Address</h1>
                                <p class="mb-30">Didn't get the link? After giving it a few seconds and checking your spam folder
                                    feel free to press the button below to try again
                                </p>
                                @if (session('status') == 'verification-link-sent')
                                    <div class="alert alert-success">
                                        A new email verification link has been emailed to you!
                                    </div>
                                @endif
                            </div>
                            {!! Form::open(['url' => '/email/verification-notification', 'method' => 'post']) !!}
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
