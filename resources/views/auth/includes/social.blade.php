@if(config('services.facebook.active'))
    <a href="{{ route('frontend.auth.social.login', 'facebook') }}" class="facebook rounded p-5">
        <x-icons.facebook/>
    </a>
@endif
@if(config('services.twitter.active'))
    <a href="{{ route('frontend.auth.social.login', 'twitter') }}" class="twitter rounded p-5">
        <x-icons.twitter/>
    </a>
@endif
@if(config('services.google.active'))
    <a href="{{ route('frontend.auth.social.login', 'google') }}" class="google rounded p-5">
        <x-icons.google/>
    </a>
@endif
@if(config('services.linkedin.active'))
    <a href="{{ route('frontend.auth.social.login', 'linkedin') }}" class="linkedin rounded p-5">
        <x-icons.linkedin/>
    </a>
@endif
@if(config('services.github.active'))
    <a href="{{ route('frontend.auth.social.login', 'github') }}" class="github rounded p-5">
        <x-icons.github/>
    </a>
@endif
@if(config('services.bitbucket.active'))
    <a href="{{ route('frontend.auth.social.login', 'bitbucket') }}" class="bitbucket rounded p-5">
        <x-icons.bitbucket/>
    </a>
@endif
