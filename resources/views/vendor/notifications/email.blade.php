@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('notification.whoops')
@else
# {{ __('notification.hello') }}
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{!! $line !!}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{!! $line !!}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{!! __('notification.thankYou') !!}<br/>

**{{ __('notification.regards') }},**<br/>
**{{ config('app.name') }}**
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
{{ __('notification.actionNote', [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
]) }}
@endslot
@endisset
@endcomponent
