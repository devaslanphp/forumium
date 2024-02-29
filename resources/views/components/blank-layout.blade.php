<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>{{ config('app.name') }} @if($title)
            - {{ $title }}
        @endif</title>
    @livewireStyles

    <x-app.global-styles/>
</head>
<body>
@include('partials.loading-page')
{{ $slot }}

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
@livewireScripts
@vite('resources/js/app.js')
@stack('scripts')
</body>
</html>
