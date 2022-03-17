<header>
    <div class="container">
        <div class="bg-gray-200 dark:bg-gray-600 rounded-xl px-5 py-4 flex items-center justify-between shadow-xl">
            <div id="sitelogo">
                @include('includes.partials.logo')
            </div>
            <nav id="main-nav">
                <ul class="hidden lg:flex">
                    <li>
                        <a href="{{ route('frontend.index') }}" class="{{ activeClass(Route::is('frontend.index')) }}">{{ __('Home') }}</a>
                    </li>
                    <li x-data="{showPages: false}" class="relative">
                        <a href="#" @click.prevent="showPages = !showPages">Pages</a>
                        <ul x-show="showPages" class="absolute w-40">
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
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
                @include('includes.partials.lang')
                <ul class="hidden lg:flex items-center gap-x-5 relative" x-data="{ showUserMenu: false }">
                    @guest
                        <li><a href="{{ route('login') }}">{{ __('labels.login') }}</a></li>
                        <li><a href="{{ route('register') }}">{{ __('labels.register') }}</a></li>
                    @else
                        <button class="focus:ring-4 focus:ring-blue-300 rounded-full"
                                @click="showUserMenu = !showUserMenu; sweetalert = true;">
                            <img src="{{ $logged_in_user->avatar }}"
                                 alt="{{ $logged_in_user->full_name }}" class="rounded-full h-14 w-14">
                        </button>
                        <!--User Dropdown Menu-->
                        <div x-show="showUserMenu"
                             class="absolute top-20 right-0 bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4"
                             id="user-menu">
                            <div class="px-4 py-3">
                                <span class="block">{{ ucwords($logged_in_user->full_name) }}</span>
                                <span
                                    class="block text-sm font-medium text-gray-900 truncate">{{ $logged_in_user->roles }}</span>
                            </div>
                            <ul class="py-1" aria-labelledby="dropdown">
                                <li>
                                    <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                       class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                       class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Earnings</a>
                                </li>
                            </ul>
                            <div>
                                <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
                            </div>
                        </div>
                    @endguest
                </ul>
            </nav>
            <div x-data="{showMobileMenu: false}" class="flex items-center">
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
