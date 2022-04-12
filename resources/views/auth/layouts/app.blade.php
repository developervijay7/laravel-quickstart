<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og:https://ogp.me/ns#" @langrtl dir="rtl"
      @endlangrtl>
<head>
    <meta charset="utf-8"/>
    @include('includes.partials.google-tag-manager-head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- SEO Tags -->
    <title>@yield('title', appName())</title>
    <meta name="description" content="@yield('description', '')"/>
    <meta name="robots" content="@yield('robots', 'index,follow')"/>
    <link rel="author" href="{{ asset('humans.txt') }}">
    <link rel="cononical" href="@yield('canonical', config('app.url'))">
    <meta name="author" content="@yield('author', 'Vijay Goswami')"/>
    @include('includes.partials.favicons')
    <!-- /SEO Tags -->

    <!-- Opengraph / Facebook-->
    <meta property="og:site_name" content="@yield('og:site_name', appName())"/>
    <meta property=“og:title” content=“@yield('og:title', appName())"/>
    <meta property="og:description" content="@yield('og:description', appName())"/>
    <meta property="og:url" content="@yield('og:url', config('app.url'))"/>
    <meta property="og:type" content="article"/>
    <meta property="article:publisher" content="https://vijaygoswami.in"/>
    <meta property="article:section" content=""/>
    <meta property="article:tag" content=""/>
    <meta property="og:image" content="{{ asset('images/opengraph/og-image.png') }}"/>
    <meta property="og:image:secure_url" content="{{ asset('images/opengraph/og-image.png') }}"/>
    <meta property="og:image:width" content="1280"/>
    <meta property="og:image:height" content="640"/>
    <!-- Opengraph / Twitter-->
    <meta property="twitter:card" content="@yield('og:url', 'summary_large_image')"/>
    <meta property="twitter:image" content="{{ asset('images/opengraph/twitter-og.png') }}"/>
    <meta property="twitter:site" content="@yield('og:url', config('app.url'))"/>
    <meta property="twitter:creator" content="developervijay7"/>
    <!-- /Opengraph -->

    <!-- Search Engine Verifications Tags -->
    <meta name="msvalidate.01" content="">
    <meta name="facebook-domain-verification" content="">
    <meta name="google-site-verification" content="">
    <meta name="yandex-verification" content="">
    <!-- /Search Engine Verifications Tags -->

    <!-- Site Styling -->
    @stack('before-styles')
    <link rel="stylesheet" href="{{ mix('css/frontend.css') }}"/>
    @stack('after-styles')
    <!-- /Site Styling -->
</head>
<body class="antialiased @env('local') debug-screens @endenv"
      x-data="{currentTheme: localStorage.getItem('theme') || 'system'}"
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
