<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="{{ config('hotel.meta.author') }}">
    <meta name="title" content="{{ config('hotel.meta.title') }}">
    <meta name="description" content="{{ config('hotel.meta.description') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Início') - {{ config('app.name') }}</title>

    <meta name="keywords" content="{{ config('hotel.meta.keywords') }}">
    <meta name="rating" content="Geral">
    <meta name="robots" content="index,follow">

    <meta property="og:title" content="{{ config('hotel.meta.title') }}">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:image" content="{{ asset(config('hotel.meta.image')) }}">

    <meta name="theme-color" content="#478dde">
    <meta name="msapplication-navbutton-color" content="#478dde">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{ config('hotel.meta.twitter') }}">
    <meta name="twitter:title" content="{{ config('hotel.meta.title') }}">
    <meta name="twitter:description" content="{{ config('hotel.meta.description') }}">

    <meta name="twitter:image" content="{{ asset(config('hotel.meta.image')) }}" />

    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="20x20" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" />

    @vite(['resources/scss/app.scss'])
</head>
<body class="bg-gray-100 dark:bg-slate-900 pt-12 lg:pt-0 overflow-x-hidden">
    @if(!! getSetting('maintenance'))
        <span class="w-full h-12 flex justify-center items-center bg-red-500 text-red-800 font-bold">
            <i class="fa-solid fa-exclamation-circle mr-2"></i>
            {{ __('The hotel is currently in maintenance mode.') }}
        </span>
    @endif

    @if (Auth::check())
        <x-header.main-nav />
    @endif

    <header class="relative flex justify-start items-center py-7 border-b-2 border-blue-300 dark:border-gray-800">
        <div class="absolute inset-0 bg-blue-400" style="background-image: url('https://i.imgur.com/2UF0mT5.gif'); box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);"></div>
        <x-container class="flex lg:flex-row flex-col justify-between gap-4 lg:gap-0 items-center">
            <div class="lg:w-1/2 w-full flex flex-col justify-center items-center lg:items-start">
                <a href="/" target="_self">
                    <span class="text-4xl font-semibold text-white text-center lg:text-left drop-shadow-lg">
                        <img src="https://i.imgur.com/1e5A4hm.png" alt="Logo iHabbi">
                    </span>
                </a>
                
                @if (Auth::check() && !$fromClient)
                    <div class="mt-2 flex gap-3 flex-wrap">
                        <x-ui.buttons.redirectable
                            href="{{ route('hotel.nitro') }}"
                            data-turbolinks="false"
                            class="dark:bg-gray-500 bg-gray-500 border-gray-700 hover:bg-gray-400 dark:hover:bg-gray-400 dark:shadow-gray-700/75 shadow-gray-600/75 py-2 text-white"
                        >
                            {{ __('Entrar (Nitro v2)') }}
                        </x-ui.buttons.redirectable>

                        <x-ui.buttons.redirectable
                            href="{{ route('hotel.nitroFlash') }}"
                            class="dark:bg-orange-500 bg-orange-500 border-orange-700 hover:bg-orange-400 dark:hover:bg-orange-400 dark:shadow-orange-700/75 shadow-orange-600/75 py-2 text-white"
                        >
                            {{ __('Entrar (Nitro Flash)') }}
                        </x-ui.buttons.redirectable>

                        @if (Auth::user()->rank >= getSetting('min_rank_to_housekeeping_login'))
                            <x-ui.buttons.redirectable
                                href="/admin"
                                target="_blank"
                                class="dark:bg-red-500 bg-red-500 border-red-700 hover:bg-red-400 dark:hover:bg-red-400 dark:shadow-red-700/75 shadow-red-600/75 py-2 text-white"
                            >
                                <i class="fa-solid fa-chart-line mr-1"></i>
                                {{ __('Housekeeping') }}
                            </x-ui.buttons.redirectable>
                        @endif
                    </div>
                @endif
            </div>
            <x-header.user-box />
        </x-container>
    </header>

    @guest
        <x-header.auth-nav />
    @endguest

    @auth
    @include('pages.users.fragments.user.balances')
    @endauth

    <main class="mt-4">
        @yield('content')
    </main>

    @include('layouts.footer')
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>
</html>
