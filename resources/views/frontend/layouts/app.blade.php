<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: https://ogp.me/ns#" @langrtl dir="rtl"
      @endlangrtl>
<head>
    <meta charset="utf-8"/>
    @include('includes.partials.google-tag-manager-head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta name="robots" content="index,follow"/>
    <link rel="author" href="{{ asset('humans.txt') }}">
    <title>@yield('title', appName())</title>
    <meta name="author" content="@yield('author', 'Vijay Goswami')"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @include('includes.partials.favicons')
    @stack('before-styles')
    <link rel="stylesheet" href="{{ mix('css/frontend.css') }}"/>
    @stack('after-styles')
</head>
<body class="overflow-x-hidden antialiased @env('local') debug-screens @endenv"
      x-data="{currentTheme: localStorage.getItem('theme') || localStorage.setItem('theme', 'system'), sweetalert: false, vijay: true}"
      x-init="$watch('currentTheme', val => localStorage.setItem('theme', val)); currentScreenWidth = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;"
      :class="{'dark': currentTheme === 'dark' || (currentTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
>
@include('includes.partials.google-tag-manager-body')
<div class="h-5 w-5 hidden h-8 w-8 rotate-45 -rotate-45 origin-center duration-500">temporary just to add class will remove soon</div>
<div id="app" class="px-5 py-6 dark:bg-gray-900 dark:text-white">
    @include('frontend.layouts.includes.header')
    @if (Breadcrumbs::has() && !Route::is('frontend.index'))
    <div class="container">
        <div class="bg-gray-200 dark:bg-gray-600 rounded-xl px-5 py-4 flex items-center justify-between shadow-xl my-6">
            @include('frontend.includes.partials.breadcrumbs')
        </div>
    </div>
    @endif
    @yield('content')
    @include('frontend.layouts.includes.footer')
</div>
@include('includes.partials.sweetalert')
@stack('before-scripts')
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/frontend.js') }}"></script>
@stack('after-scripts')
</body>
</html>
