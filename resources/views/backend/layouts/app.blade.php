<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: https://ogp.me/ns#" @langrtl dir="rtl"
      @endlangrtl>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', appName()) Administration</title>
    <link rel="stylesheet" href="{{ mix('css/backend.css') }}">
</head>
<body class="overflow-x-hidden antialiased @env('local') debug-screens @endenv"
      x-data="{currentTheme: localStorage.getItem('theme') || localStorage.setItem('theme', 'system')}"
      x-init="$watch('currentTheme', val => localStorage.setItem('theme', val))"
      :class="{'dark': currentTheme === 'dark' || (currentTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
>
<img src="{{ asset('backend/frontend/logo-dark.svg') }}" alt="Laravel Quick-Start Logo"
     style="height: 100px;">
<h1 class="text-3xl font-bold underline">
    Hello world! from Backend
</h1>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/backend.js') }}"></script>
</body>
</html>
