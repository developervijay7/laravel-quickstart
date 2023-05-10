<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: https://ogp.me/ns#" @langrtl dir="rtl"
      @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', appName()) Administration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="robots" content="nofollow"/>
    @include('includes.partials.favicons')
    @stack('before-styles')
    @vite(['resources/css/backend/app.css', 'resources/js/backend/app.js'])
    @stack('after-styles')
</head>
<body class="antialiased @env('local') debug-screens @endenv"
      x-data="{currentTheme: localStorage.getItem('theme') || 'light'}"
      x-init="$watch('currentTheme', val => localStorage.setItem('theme', val)); currentScreenWidth = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;"
      :class="{'dark': currentTheme === 'dark' || (currentTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
      x-cloak
>
<div id="app">
    @include('includes.partials.read-only')
    @include('includes.partials.logged-in-as')
    <div class="bg-purple-500 dark:bg-gray-900 min-h-screen px-3 md:p-5">
        <div class="md:flex">
            @include('backend.layouts.includes.sidebar')
            <div id="content" class="bg-gray-200 dark:bg-gray-800 w-full rounded-3xl px-2 md:px-5 mt-5 md:mt-0">
                @include('backend.layouts.includes.header')
                <div class="grid min-h-screen rounded-b-3xl content-start">
                    <div class="mt-2">
                        @include('includes.partials.messages')
                    </div>
                    @yield('content')
                </div>
                @include('backend.layouts.includes.footer')
            </div>
        </div>
    </div>
</div>
@stack('before-scripts')
@stack('after-scripts')
@include('includes.partials.sweet-alert')
@include('includes.partials.toasts')
</body>
</html>
