<div class="flex items-center gap-x-3">
    @if ($user->trashed() && $logged_in_user->hasAllAccess())
        <x-utils.form-button :action="route('admin.auth.user.restore', $user)" method="patch" title="Restore User" name="confirm-item" class="rounded p-1 text-sm bg-purple-500">
            <x-slot name="icon">
                <x-icons.key />
            </x-slot>
            @lang('Restore')
        </x-utils.form-button>

        @if (config('quickstart.access.user.permanently_delete'))
            <x-utils.delete-button name="permanent-delete-item" :href="route('admin.auth.user.permanently-delete', $user)" :text="__('Permanently Delete')" title="Permanently Delete" class="rounded p-1 text-sm" />
        @endif
    @else
        @if ($logged_in_user->hasAllAccess())
            <x-utils.view-button :href="route('admin.auth.user.show', $user)" title="View User" class="rounded p-1 text-sm bg-yellow-500" />
            <x-utils.edit-button :href="route('admin.auth.user.edit', $user)" title="Edit User" class="rounded p-1 text-sm bg-green-500" />
        @endif

        @if (! $user->isActive())
            <x-utils.form-button :action="route('admin.auth.user.mark', [$user, 1])" method="patch" class="rounded p-1 text-sm bg-pink-500" name="confirm-item" permission="admin.access.user.reactivate">
                <x-slot name="icon">
                    <x-icons.refresh />
                </x-slot>
                @lang('Reactivate')
            </x-utils.form-button>
        @endif

        @if ($user->id !== $logged_in_user->id && !$user->isMaster() && $logged_in_user->hasAllAccess())
            <x-utils.delete-button :action="route('admin.auth.user.destroy', $user)" title="Delete User" class="rounded p-1 text-sm" />
        @endif

{{--         The logged in user is the master admin, and the row is the master admin. Only the master admin can do anything to themselves--}}
        @if ($user->isMaster() && $logged_in_user->isMaster())
            <x-utils.link :href="route('admin.auth.user.change-password', $user)" title="Change Password for User" class="rounded p-1 text-sm bg-pink-500" :text="__('Change Password')" permission="admin.access.user.change-password">
                <x-slot name="icon">
                    <x-icons.key />
                </x-slot>
            </x-utils.link>
        @elseif (
            !$user->isMaster() && // This is not the master admin
            $user->isActive() && // The account is active
            $user->id !== $logged_in_user->id && // It's not the person logged in
            // Any they have at lease one of the abilities in this dropdown
            (
                $logged_in_user->can('admin.access.user.change-password') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.deactivate')
            )
        )

            <div x-data="{showMenu: false}" class="relative">
                <a href="#" @click.prevent="showMenu = !showMenu" @click.away="showMenu = false">
                    <x-icons.chevron-down />
                </a>
                <div x-show="showMenu" class="absolute top-6 right-0 w-max bg-gray-200 dark:bg-gray-900 z-20 rounded p-3">
                    <ul>
                        <li>
                            <x-utils.link :href="route('admin.auth.user.change-password', $user)" title="Change Password For User" class="flex transition duration-100 px-2 py-1 rounded hover:bg-purple-700 dark:hover:bg-gray-800 gap-x-2 items-center" :text="__('Change Password')" permission="admin.access.user.change-password">
                                <x-slot name="icon">
                                    <x-icons.key />
                                </x-slot>
                            </x-utils.link>
                        </li>
                        @if ($user->id !== $logged_in_user->id && !$user->isMaster())
                            <li>
                                <x-utils.form-button :action="route('admin.auth.user.clear-session', $user)" title="Clear Session" name="confirm-item" class="transition duration-100 px-2 py-1 rounded hover:bg-purple-700 dark:hover:bg-gray-800 gap-x-2" permission="admin.access.user.clear-session">
                                    @lang('Clear Session')
                                    <x-slot name="icon">
                                        <x-icons.status-offline />
                                    </x-slot>
                                </x-utils.form-button>
                            </li>
                            @canBeImpersonated($user)
                            <li>
                                <x-utils.link :href="route('impersonate', $user->id)" title="Login as {{ $user->first_name }}" class="flex transition duration-100 px-2 py-1 rounded hover:bg-purple-700 dark:hover:bg-gray-800 gap-x-2 items-center" :text="__('Login As ' . $user->first_name)" permission="admin.access.user.impersonate">
                                    <x-slot name="icon">
                                        <x-icons.users />
                                    </x-slot>
                                </x-utils.link>
                            </li>
                            @endCanBeImpersonated
                            <li>
                                <x-utils.form-button :action="route('admin.auth.user.mark', [$user, 0])" title="Deactivate User" method="patch" class="transition duration-100 px-2 py-1 rounded hover:bg-purple-700 dark:hover:bg-gray-800 gap-x-2" name="confirm-item" permission="admin.access.user.deactivate">
                                    @lang('Deactivate')
                                    <x-slot name="icon">
                                        <x-icons.excel />
                                    </x-slot>
                                </x-utils.form-button>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        @endif
    @endif
</div>
