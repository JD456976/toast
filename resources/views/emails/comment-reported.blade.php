@component('mail::message')
Hello Admin,

This comment was reported:

Reason: {{ $comment->report->reason }}

Comment:

{{ $comment->report->comment }}

The body of your message.

@component('mail::button', ['url' => $url])
    Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
