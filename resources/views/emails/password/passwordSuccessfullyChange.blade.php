@component('mail::message')
# Hello {{$user['name']}} ,

Your password has been successfully changed.

Thanks,<br>
{{ config('app.name') }}

*{{__('Note: This is autogenerated email. Please do not reply.')}}*
@endcomponent
