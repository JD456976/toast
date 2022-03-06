@component('mail::message')
Hello Admin,

This deal was reported:

Reason: {{ $deal->report->reason }}

Comment:

{{ $deal->report->comment }}

The body of your message.

@component('mail::button', ['url' => $url])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
