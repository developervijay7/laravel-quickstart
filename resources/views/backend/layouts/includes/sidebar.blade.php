<nav id="side-nav" class="md:w-72 md:block dark:text-white" x-data="{ showMenu: currentScreenWidth >= 768 ? true : false}">
    <div class="flex items-center justify-between">
        <div id="logo" class="pb-2 pr-5">
            @include('includes.partials.logo')
        </div>
        <div class="md:hidden">
            <a href="#" @click.prevent="showMenu = !showMenu">
                <svg class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
    <div class="md:pr-5">
        <hr>
    </div>
    <ul x-show="showMenu">
        <li class="relative my-2 md:my-5" x-data="{showSubMenu: {{ activeClass(Route::is('admin.dashboard') || Route::is('log-viewer*'), 'true', 'false') }}}">
            <a href="#" class="{{ activeClass(Route::is('admin.dashboard') || Route::is('log-viewer*'), 'bg-gray-200 dark:bg-gray-800 menu-vertical', 'hover:bg-purple-600 dark:hover:bg-gray-800') }} flex py-3 md:px-5 items-center space-x-1 relative md:rounded-l-3xl hover:bg-purple-600 dark:hover:bg-gray-800" @click.prevent="showSubMenu = !showSubMenu">
                <svg class="ml-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                </svg>
                <span class="pr-20">Dashboard</span>
                <svg class="h-4 w-4 transform transition absolute right-3 md:right-10" fill="none" viewBox="0 0 24 24" stroke="currentColor":class="showSubMenu ? '-rotate-180' : ''" >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
            <div class="px-2 md:pr-5">
                <ul class="bg-purple-600 dark:bg-gray-700 rounded transition ease-in-out p-2 mt-1" x-show="showSubMenu == true">
                    <li>
                        <x-utils.link :href="route('admin.dashboard')" title="View {{ appName() }} Dashboard" class="{{ activeClass(Route::is('admin.dashboard'), 'font-bold bg-purple-200 dark:bg-gray-400', '') }} flex transition duration-100 px-2 py-1 rounded hover:bg-purple-700 dark:hover:bg-gray-800 gap-x-2 items-center" :text="__('Admin Dashboard')" :hideText="false">
                            <x-slot name="icon">
                                <x-icons.briefcase />
                            </x-slot>
                        </x-utils.link>
                    </li>
                    @if($logged_in_user->isMaster())
                        <li>
                            <x-utils.link :href="route('log-viewer::dashboard')" title="View Log Dashboard" class="{{ activeClass(Route::is('log-viewer::dashboard') || Route::is('log-viewer::logs.list') || Route::is('log-viewer::logs.show'), 'font-bold bg-purple-200 dark:bg-gray-400', '') }} flex transition duration-100 px-2 py-1 rounded hover:bg-purple-700 dark:hover:bg-gray-800 gap-x-2 items-center" :text="__('Log Dashboard')" :hideText="false">
                                <x-slot name="icon">
                                    <x-icons.rss />
                                </x-slot>
                            </x-utils.link>
                        </li>
                    @endif
                </ul>
            </div>
        </li>
        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.manage.course') ||
                $logged_in_user->can('admin.access.manage.teacher') ||
                $logged_in_user->can('admin.access.manage.faculty') ||
                $logged_in_user->can('admin.access.manage.department') ||
                $logged_in_user->can('admin.access.manage.cell') ||
                $logged_in_user->can('admin.access.manage.center') ||
                $logged_in_user->can('admin.access.manage.committee') ||
                $logged_in_user->can('admin.access.manage.staff')
            )
        )
            <li class="relative my-2 md:my-5" x-data="{showSubMenu: {{ activeClass(Route::is('admin.administration.*'), 'true', 'false') }}}">
                <a href="#" class="{{ activeClass(Route::is('admin.administration.*'), 'bg-gray-200 dark:bg-gray-800 menu-vertical', 'hover:bg-purple-600 dark:hover:bg-gray-800') }} flex py-3 md:px-5 items-center space-x-1 relative md:rounded-l-3xl hover:bg-purple-600 dark:hover:bg-gray-800" @click.prevent="showSubMenu = !showSubMenu" :hideText="false">
                    <x-icons.adjustments />
                    <span class="pr-20">Administration</span>
                    <svg class="h-4 w-4 transform transition absolute right-3 md:right-10" fill="none" viewBox="0 0 24 24" stroke="currentColor":class="showSubMenu ? '-rotate-180' : ''" >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
            </li>
        @endif

        <div class="md:pr-5">
            <hr>
        </div>
        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password')
            )
        )
            <li class="relative my-2 md:my-5" x-data="{showSubMenu: {{ activeClass(Route::is('admin.auth.*'), 'true', 'false') }}}">
                <a href="#" class="flex py-3 md:px-5 items-center space-x-1 relative md:rounded-l-3xl {{ activeClass(Route::is('admin.auth.*'), 'bg-gray-200 dark:bg-gray-800 menu-vertical', 'hover:bg-purple-600 dark:hover:bg-gray-800') }}" @click.prevent="showSubMenu = !showSubMenu">
                    <svg class="ml-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="pr-20">Access</span>
                    <svg class="h-4 w-4 transform transition absolute right-3 md:right-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" :class="showSubMenu ? '-rotate-180' : ''" >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <div class="px-2 md:pr-5">
                    <ul class="bg-purple-600 dark:bg-gray-700 rounded transition ease-in-out p-2 mt-1" x-show="showSubMenu == true">
                        <li>
                            <x-utils.link :href="route('admin.auth.user.index')" title="Manager User Accounts" class="{{ activeClass(Route::is('admin.auth.user.*'), 'font-bold bg-purple-200 dark:bg-gray-400', '') }} flex transition duration-100 px-2 py-1 rounded hover:bg-purple-700 dark:hover:bg-gray-800 gap-x-2 items-center" :text="__('User Management')" :hideText="false">
                                <x-slot name="icon">
                                    <x-icons.user />
                                </x-slot>
                            </x-utils.link>
                        </li>
                        <li>
                            <x-utils.link :href="route('admin.auth.role.index')" title="Manager Roles" class="{{ activeClass(Route::is('admin.auth.role.*'), 'font-bold bg-purple-200 dark:bg-gray-400', '') }} flex transition duration-100 px-2 py-1 rounded hover:bg-purple-700 dark:hover:bg-gray-800 gap-x-2 items-center" :text="__('Role Management')" :hideText="false">
                                <x-slot name="icon">
                                    <x-icons.user-circle />
                                </x-slot>
                            </x-utils.link>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
    </ul>
</nav>
