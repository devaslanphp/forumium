<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ config('app.name') }} @if($title) - {{ $title }} @endif</title>

    @livewireStyles
</head>
<body x-cloak x-data="sidebar()">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{ $slot }}

    {{-- SIDEBAR --}}
    @include('partials.sidebar')

    {{-- DIALOGS --}}
    @include('partials.dialogs.add-discussion')
    @include('partials.dialogs.login')
    @include('partials.dialogs.sign-up')

    <script>
        function sidebar() {
            return {
                sidebarOpen: false,
                sidebarProductMenuOpen: false,
                openSidebar() {
                    this.sidebarOpen = true
                },
                closeSidebar() {
                    this.sidebarOpen = false
                },
                sidebarProductMenu() {
                    if (this.sidebarProductMenuOpen === true) {
                        this.sidebarProductMenuOpen = false
                        window.localStorage.setItem('sidebarProductMenuOpen', 'close');
                    } else {
                        this.sidebarProductMenuOpen = true
                        window.localStorage.setItem('sidebarProductMenuOpen', 'open');
                    }
                },
                checkSidebarProductMenu() {
                    if (window.localStorage.getItem('sidebarProductMenuOpen')) {
                        if (window.localStorage.getItem('sidebarProductMenuOpen') === 'open') {
                            this.sidebarProductMenuOpen = true
                        } else {
                            this.sidebarProductMenuOpen = false
                            window.localStorage.setItem('sidebarProductMenuOpen', 'close');
                        }
                    }
                },
            }
        }
    </script>

    @livewireScripts
    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>
