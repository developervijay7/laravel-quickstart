<div class="relative group">
    <div class="absolute inset-0 bg-gray-900 opacity-0 hover:opacity-70 rounded-full w-56 h-56 mx-auto cursor-pointer" onclick="$('#avatar-form').click();">
        <div class="w-full text-white mt-28">
            <svg class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <h2 class="text-white">Click to {{ $logged_in_user->profile_picture ? 'Change' : 'Upload' }}</h2>
        </div>
    </div>
    <img src="{{ asset($logged_in_user->getAvatar()) }}" alt="{{ $logged_in_user->name }}" class="rounded-full mx-auto w-56 h-56">
</div>
<h3 class="text-2xl">{{ $logged_in_user->name }}</h3>
<h4 class="text-lg"></h4>
<nav class="mt-10">
    <ul class="text-xl">
        <li class="">
            <a href="{{ route('frontend.user.dashboard') }}" class="border py-3 block hover:bg-red-200 {{ activeClass(Route::is('frontend.user.dashboard'), 'bg-red-200') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('frontend.user.profile') }}" class="border py-3 block hover:bg-red-200 {{ activeClass(Route::is('frontend.user.profile'), 'bg-red-200') }}">My Profile</a>
        </li>
        <li>
            <x-utils.logout-button :action="route('logout')" class="border py-3 hover:bg-red-200 justify-center" :hideText="false">
                @lang('Logout')
            </x-utils.logout-button>
        </li>
    </ul>
</nav>
