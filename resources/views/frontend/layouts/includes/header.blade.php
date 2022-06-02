<header>
    <div class="container">
        <div class="bg-gray-200 dark:bg-gray-600 rounded-xl px-5 py-4 flex items-center justify-between shadow-xl">
            <div id="sitelogo">
                @include('includes.partials.logo')
            </div>
            <nav id="main-nav">
                <ul class="hidden lg:flex items-center">
                    <li>
                        <a href="{{ route('frontend.index') }}" class="{{ activeClass(Route::is('frontend.index')) }}">{{ __('Home') }}</a>
                    </li>
                    <li x-data="{showPages: false}" class="relative">
                        <a href="#" @click.prevent="showPages = !showPages" @click.away="showPages = false" class="flex items-center {{ activeClass(Route::is('frontend.pages.*')) }}">
                            {{ __('labels.pages') }}
                            <span>
                                <x-icons.chevron-down :size="5" class="transform transition origin-center duration-250" ::class="showPages ? '-rotate-180' : ''" />
                            </span>
                        </a>
                        <ul x-show="showPages" x-cloak class="absolute top-14 right-0 md:left-0 mt-2 w-48 rounded-md shadow-lg z-90 bg-gray-200 dark:bg-gray-600 ring-1 ring-black ring-opacity-5 focus:outline-none">
                            @if(config('quickstart.access.user.login'))
                                <li><a href="{{ route('login') }}" class="text-sm hover:bg-accent hover:text-white text-gray-700 block py-2 mx-0 px-6">{{ __('labels.login') }}</a></li>
                            @endif
                            @if(config('quickstart.access.user.registration'))
                                <li><a href="{{ route('register') }}" class="text-sm hover:bg-accent hover:text-white text-gray-700 block py-2 mx-0 px-6">{{ __('labels.register') }}</a></li>
                            @endif
                            <li><a href="#" class="text-sm hover:bg-accent hover:text-white text-gray-700 block py-2 mx-0 px-6">{{ __('labels.reset-password') }}</a></li>
                            <li><a href="#" class="text-sm hover:bg-accent hover:text-white text-gray-700 block py-2 mx-0 px-6">{{ __('labels.forgot-password') }}</a></li>
                            <li><a href="{{ route('frontend.auth.user.change_password') }}" class="text-sm hover:bg-accent hover:text-white text-gray-700 block py-2 mx-0 px-6">{{ __('labels.change-password') }}</a></li>
                            <li><a href="{{ route('frontend.legal.policy') }}" class="text-sm hover:bg-accent hover:text-white text-gray-700 block py-2 mx-0 px-6">{{ __('labels.privacy-policy') }}</a></li>
                            <li><a href="{{ route('frontend.legal.terms') }}" class="text-sm hover:bg-accent hover:text-white text-gray-700 block py-2 mx-0 px-6">{{ __('labels.terms-of-service') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('frontend.contact') }}" class="{{ activeClass(Route::is('frontend.contact')) }}">{{ __('Contact') }}</a>
                    </li>
                </ul>
            </nav>
            <div>
                @include('includes.partials.switch')
            </div>
            <nav id="actions-nav" class="flex gap-x-12 items-center" x-cloak>
                <div class="relative flex items-center rounded-md bg-gray-300 dark:bg-gray-900 py-1 px-3">
                    @include('includes.partials.lang')
                </div>
                <ul class="hidden lg:flex items-center gap-x-5 relative" x-data="{ showUserMenu: false }">
                    @guest
                        <li><a href="{{ route('login') }}">{{ __('labels.login') }}</a></li>
                        @if(config('quickstart.access.user.registration'))
                        <li><a href="{{ route('register') }}">{{ __('labels.register') }}</a></li>
                        @endif
                    @else
                        <button class="focus:ring-4 focus:ring-blue-300 rounded-full"
                                @click="showUserMenu = !showUserMenu">
                            <img src="{{ $logged_in_user->avatar }}"
                                 alt="{{ $logged_in_user->full_name }}" class="rounded-full h-14 w-14">
                        </button>
                        <!--User Dropdown Menu-->
                        <div x-show="showUserMenu"
                             class="absolute top-20 right-0 bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4"
                             id="user-menu">
                            <div class="px-4 py-3">
                                <span class="block text-lg">{{ ucwords($logged_in_user->full_name) }}</span>
                                @if(count($logged_in_user->roles))
                                    <span
                                        class="block text-xs font-medium text-gray-900 truncate text-upper">{{ $logged_in_user->roles[0]->name }}</span>
                                @endif
                            </div>
                            <ul aria-labelledby="dropdown">
                                <li>
                                    <a href="{{ route('frontend.user.dashboard') }}" class="text-sm hover:bg-gray-100 text-gray-700 block py-2">Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.user.profile') }}"
                                       class="text-sm hover:bg-gray-100 text-gray-700 block py-2">Profile</a>
                                </li>
                                @if($logged_in_user->type !== 'User')
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}"
                                           class="text-sm hover:bg-gray-100 text-gray-700 block py-2">Administration</a>
                                    </li>
                                @endif
                            </ul>
                            <div>
                                <x-utils.logout-button :action="route('logout')" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2" :hideText="false">{{ __('labels.logout') }}</x-utils.logout-button>
                            </div>
                        </div>
                    @endguest
                </ul>
            </nav>
            <div x-data="{showMobileMenu: false}" class="flex items-center" x-cloak>
                <button @click="showMobileMenu = !showMobileMenu" class="bg-gray-300 dark:bg-gray-900 rounded-md p-1">
                    <svg class="w-6 h-6" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
                        <path class="transform transition origin-center duration-250" :class="showMobileMenu ? 'rotate-45 translate-y-2 -translate-x-2' : ''" d="M7.94977 11.9498H39.9498" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path class="transform transition duration-250" :class="showMobileMenu ? 'hidden' : 'block'" d="M7.94977 23.9498H39.9498" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path class="transform transition origin-center duration-250" :class="showMobileMenu ? '-rotate-45 -translate-y-2 -translate-x-2' : ''" d="M7.94977 35.9498H39.9498" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>
