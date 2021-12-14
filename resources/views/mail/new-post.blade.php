@component('mail::message')
# {{ $details['title'] }}

{{ $details['excerpt'] }}

@component('mail::button', ['url' => $details['link']])
Read Full Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
