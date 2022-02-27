<x-layouts.admin>
    <x-slot:title>
        Reset A Password
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <h2>Send Password Reset Link</h2>
                        {!! Form::open(['route' => 'admin.send-password', 'method' => 'post']) !!}
                        <div class="form-floating mb-7">
                            {!! Form::email('email', '', ['class' => 'form-control', 'id' => 'email']) !!}
                            {!! Form::label('email') !!}
                            @error('email')
                            <x-admin.alert type="danger" :message="$message" />
                            @enderror
                        </div>
                        <div class="form-floating mb-7">
                            <x-button type="primary" text="Send" />
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
