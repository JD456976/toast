<x-layouts.app>
    <x-slot:title>
        Verify Your Email
    </x-slot:title>
    <div class="container clearfix">
        <div class="row justify-content-center">
            <div class="col-5">
                <h2>Verify Your Email Address</h2>
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        A new email verification link has been emailed to you!
                    </div>
                @endif
                <p>
                    Didn't get the link? After giving it a few seconds and checking your spam folder
                    feel free to press the button below to try again
                </p>
                {!! Form::open(['url' => '/email/verification-notification', 'method' => 'post']) !!}
                    <x-button type="dark" text="Resend Verification Email" />
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-layouts.app>
