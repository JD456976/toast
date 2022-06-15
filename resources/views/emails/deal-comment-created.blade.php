@component('mail::message')
    Hello {{ $deal->user->name }}

    A new comment was posted on one of your deals.

    @component('mail::button', ['url' => $url])
        {{ $deal->title }}
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
