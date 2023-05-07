<a href="{{ route('frontend.index') }}" title="{{ __('labels.app-name') }}">
    <img x-cloak src="{{ Vite::asset('resources/images/logo.svg') }}" class="h-14"
         :class="{'hidden': currentTheme === 'dark' || (currentTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
         alt="{{ config('app.name') }} Logo"/>
    <img x-cloak src="{{ Vite::asset('resources/images/logo-dark.svg') }}" class="h-14"
         :class="{'hidden': currentTheme === 'light' || (currentTheme === 'system' && ! window.matchMedia('(prefers-color-scheme: dark)').matches)}"
         alt="{{ config('app.name') }} Logo"/>
</a>
