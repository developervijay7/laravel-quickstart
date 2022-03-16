<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: https://ogp.me/ns#" @langrtl dir="rtl"
      @endlangrtl>
<head>
    <meta charset="utf-8"/>
    @include('includes.partials.google-tag-manager-head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta name="robots" content="index,follow"/>
    <link rel="author" href="{{ asset('humans.txt') }}"/>
    <title>@yield('title', appName())</title>
    <meta name="author" content="@yield('author', 'Vijay Goswami')"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @stack('before-styles')
    <link rel="stylesheet" href="{{ mix('css/frontend.css') }}"/>
    @stack('after-styles')
</head>
<body class="antialiased @env('local') debug-screens @endenv"
      x-data="{currentTheme: localStorage.getItem('theme') || localStorage.setItem('theme', 'system')}"
      x-init="$watch('currentTheme', val => localStorage.setItem('theme', val))"
      :class="{'dark': currentTheme === 'dark' || (currentTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
>
@include('includes.partials.google-tag-manager-body')
<div id="app" class="dark:bg-gray-900">
    @yield('content')
</div>
@stack('before-scripts')
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/frontend.js') }}"></script>
@stack('after-scripts')
</body>
</html>
