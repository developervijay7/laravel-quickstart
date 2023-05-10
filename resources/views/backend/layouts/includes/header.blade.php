<header id="top-bar" class="flex py-1 rounded-t-3xl border-b-2 border-gray-300 dark:border-white justify-between items-center">
    <div class="hidden md:block">
        @include('backend.includes.partials.breadcrumbs')
    </div>
    <div class="flex items-center space-x-5 flex-shrink-0">
        <!-- Header Search -->
        <div class="xl:block" itemscope itemtype="https://schema.org/WebSite">
            <meta itemprop="url" content="{{ route('frontend.index') }}"/>
            <x-forms.get class="flex items-center gap-x-2" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction" role="search">
                <meta itemprop="target" content="?q={q}"/>
                <x-forms.inputs.text id="header-search" label="{{ __('labels.search') }}" name="header-search" placeholder="{{ __('labels.search') }}" value="{{ request()->get('q') ?? '' }}" class="w-full rounded-lg"  itemprop="query-input" aria-label="Search"/>
                <x-forms.inputs.submit color="green">Search</x-forms.inputs.submit>
            </x-forms.get>
        </div>
        <div class="relative">
            @include('includes.partials.lang')
        </div>
        <div class="">
            @include('includes.partials.switch')
        </div>
        <div class="md:hidden">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <div class="text-black dark:text-white">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </div>
        <div class="flex-shrink-0">
            <div class="relative" x-data="{ showUserMenu: false }">
                <a href="#" @click="showUserMenu = !showUserMenu" @click.away="showUserMenu = false">
                    <button class="focus:ring-4 focus:ring-blue-300 rounded-full"
                            @click="showUserMenu = !showUserMenu">
                        <img src="{{ $logged_in_user->avatar }}"
                             alt="{{ $logged_in_user->full_name }}" class="rounded-full h-14 w-14">
                    </button>
                </a>
                <nav x-show="showUserMenu" class="absolute right-0 mt-2 w-52 bg-primary dark:bg-gray-900 rounded-md overflow-hidden shadow-xl z-20 text-black dark:text-white p-2" aria-label="User Navigation">
                    <ul>
                        <li>
                            <div class="font-bold font-lg px-2">{{ $logged_in_user->complete_name }}</div>
                            <div class="text-sm px-2">{{ $logged_in_user->email }}</div>
                        </li>
                        <div class="py-1">
                            <hr>
                        </div>
                        <li>
{{--                            <x-utils.link :href="route('admin.profile.show')" title="Manage User Profile" class="flex transition duration-100 px-2 py-1 rounded hover:bg-primary dark:hover:bg-gray-800 gap-x-2 items-center" :text="__('User Profile')" :hideText="false">--}}
{{--                                <x-slot name="icon">--}}
{{--                                    <x-icons.user-circle />--}}
{{--                                </x-slot>--}}
{{--                            </x-utils.link>--}}
                        </li>
                        <li>
                            <x-utils.link :href="route('admin.dashboard')" title="View Dashboard" class="flex transition duration-100 px-2 py-1 rounded hover:bg-primary dark:hover:bg-gray-800 gap-x-2 items-center" :text="__('Dashboard')" :hideText="false">
                                <x-slot name="icon">
                                    <x-icons.chart-square-bar />
                                </x-slot>
                            </x-utils.link>
                        </li>
                        <li>
{{--                            <x-utils.link :href="route('admin.password.show')" title="Change Password" class="flex transition duration-100 px-2 py-1 rounded hover:bg-primary dark:hover:bg-gray-800 gap-x-2 items-center" :text="__('Change Password')" :hideText="false">--}}
{{--                                <x-slot name="icon">--}}
{{--                                    <x-icons.key />--}}
{{--                                </x-slot>--}}
{{--                            </x-utils.link>--}}
                        </li>
                        <div class="py-1">
                            <hr>
                        </div>
                        <li>
                            <x-utils.logout-button :action="route('logout')" class="transition duration-100 px-2 py-1 rounded hover:bg-primary dark:hover:bg-gray-800 gap-x-2" :hideText="false">
                                @lang('Logout')
                                <x-slot name="icon">
                                    <x-icons.logout />
                                </x-slot>
                            </x-utils.logout-button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
