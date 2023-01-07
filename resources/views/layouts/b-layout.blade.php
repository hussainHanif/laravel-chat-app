<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('chat-ui/images/favicon.ico') }}" />
    <!-- magnific-popup css -->
    <link href="{{ asset('chat-ui/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" />
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('chat-ui/plugins/owl.carousel/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('chat-ui/plugins/owl.carousel/assets/owl.theme.default.min.css') }}" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('chat-ui/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Icons Css -->
    <link href="{{ asset('chat-ui/css/icons.min.css') }}" rel="stylesheet" />
    <!-- App Css-->
    <link href="{{ asset('chat-ui/css/app.css') }}" rel="stylesheet" />
    @vite(['resources/js/app.js'])
    @livewireStyles
    @if (isset($head))
        {{ $head }}
    @endif
</head>

<body>
    <div>
        {{ $slot }}
    </div>
    <!-- JAVASCRIPT -->
    @livewireScripts
    <script src="{{ asset('chat-ui/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('chat-ui/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('chat-ui/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('chat-ui/plugins/node-waves/waves.min.js') }}"></script>
    <!-- Magnific Popup-->
    <script src="{{ asset('chat-ui/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('chat-ui/plugins/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('chat-ui/js/app.js') }}"></script>

    @if (isset($footer))
        {{ $footer }}
    @endif
</body>

</html>
