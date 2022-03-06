@component('mail::message')
Hello Admin,

{{ $request->name }} wrote:

{{ $request->message }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
