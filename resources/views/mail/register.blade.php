@component('mail::message')
# Registration Successfull

Hello {{ $details['name'] }}, Thanks for registaring on {{ config('app.name') }}

@component('mail::button', ['url' => config('app.url')])
Explore New Posts
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
