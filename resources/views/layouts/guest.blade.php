<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    @php
        $isLoginRoute = request()->routeIs('login');
    @endphp
    <body @class([
            'font-sans text-gray-900 antialiased relative min-h-screen',
            'bg-gradient-to-br from-slate-950 via-slate-900 to-emerald-800 text-white' => $isLoginRoute,
        ])>
        @unless ($isLoginRoute)
            <div class="absolute inset-0 overflow-hidden">
                <iframe
                    class="absolute top-1/2 left-1/2 min-w-full min-h-full w-[177.78vh] h-[100vh] -translate-x-1/2 -translate-y-1/2"
                    src="https://www.youtube.com/embed/Cv61LWMZBxA?autoplay=1&mute=1&controls=0&loop=1&playlist=Cv61LWMZBxA&modestbranding=1&playsinline=1&showinfo=0&rel=0"
                    title="Background video"
                    frameborder="0"
                    allow="autoplay; encrypted-media; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
            <div class="absolute inset-0 bg-black/60"></div>
        @endunless

        <div class="relative z-10 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div @class([
                    'w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg shadow-md',
                    'bg-white/90 backdrop-blur' => ! $isLoginRoute,
                    'bg-white/10 border border-white/15 backdrop-blur-xl' => $isLoginRoute,
                ])>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
