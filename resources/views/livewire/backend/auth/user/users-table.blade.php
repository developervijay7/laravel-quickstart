<div>
    <x-utils.dynamic-table>
        <x-slot name="tableFilters">
            <div class="py-2 col-start-1 col-end-4">
                <label for="search-users">@lang('Search Users')</label>
                <x-forms.inputs.text wire:model.debounce.300ms="search" type="text" class="w-full rounded" label="{{ __('labels.search') }}" placeholder="Search Users" name="search" id="search-users" />
            </div>
            <div class="py-2 text-center">
                <label for="">Export Users</label>
                <div class="sm:flex sm:items-center sm:space-x-5">
                    @if($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.users.export'))
                        <ul class="flex">
                            <li>
                                <button type="button" wire:click="toPdf" wire:loading.attr="disabled" class="rounded-l flex items-center px-6 py-2.5 bg-blue-600 text-white text-sm uppercase hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out">
                                    PDF
                                    <x-icons.printer :size="3" class="ml-3" />
                                </button>
                            </li>
                            <li>
                                <button type="button" wire:click="toExcel" wire:loading.attr="disabled" class="flex items-center px-6 py-2.5 bg-yellow-500 text-white text-sm uppercase hover:bg-yellow-600 focus:bg-yellow-600 focus:outline-none focus:ring-0 active:bg-yellow-700 transition duration-150 ease-in-out">
                                    Excel
                                    <x-icons.printer :size="3" class="ml-3" />
                                </button>
                            </li>
                            <li>
                                <button type="button" wire:click="toHtml" wire:loading.attr="disabled" class="rounded-r flex items-center px-6 py-2.5 bg-green-500 text-white text-sm uppercase hover:bg-green-600 focus:bg-green-600 focus:outline-none focus:ring-0 active:bg-green-700 transition duration-150 ease-in-out">
                                    HTML
                                    <x-icons.printer :size="3" class="ml-3" />
                                </button>
                            </li>
                        </ul>
                    @endif
                    <x-icons.cog wire:loading class="h-[3rem] w-[3rem] animate-spin text-gray-400" />
                </div>
            </div>
            <div class="py-2 col-start-12">
                <label for="perPage">@lang('Show')</label>
                <select wire:model="perPage" name="perPage" id="perPage" class="rounded w-full appearance-none text-md py-1 px-2 focus:outline-none border-2 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-900 text-purple-900 dark:text-gray-100 placeholder-purple-300 dark:placeholder-gray-600 font-semibold">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </x-slot>
        <x-slot name="tableBody">
            <table class="w-full" id="user-table" wire:loading.class="opacity-50">
                <thead class="">
                <tr class="bg-gray-500 dark:bg-gray-800 h-12 text-left">
                    <th>Avatar</th>
                    <th wire:click.debounce.1000ms="sortBy('first_name')" class="{{ $sortBy === 'first_name' ? ($sortDirection === 'asc' ? 'asc' : 'desc') : 'sortable' }}">Full Name</th>
                    <th wire:click.debounce.1000ms="sortBy('email')" class="{{ $sortBy === 'email' ? ($sortDirection === 'asc' ? 'asc' : 'desc') : 'sortable' }}">E-mail</th>
                    <th wire:click.debounce.1000ms="sortBy('mobile')" class="{{ $sortBy === 'mobile' ? ($sortDirection === 'asc' ? 'asc' : 'desc') : 'sortable' }}">Mobile</th>
                    <th>Verified</th>
                    <th wire:click.debounce.1000ms="sortBy('created_at')" class="{{ $sortBy === 'created_at' ? ($sortDirection === 'asc' ? 'asc' : 'desc') : 'sortable' }}">Registered</th>
                    <th>Roles</th>
                    <th>Additional Permissions</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="{{ $loop->index %2 === 0 ? 'even' : 'odd' }}">
                        <td><a href="{{ route('admin.auth.user.show', $user) }}">@include('backend.auth.user.includes.type-n-avatar')</a></td>
                        <td>{{ $user->first_name}} {{ $user->last_name }}</td>
                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                        <td><a href="tel:{{ $user->mobile }}">{{ $user->mobile }}</a></td>
                        <td>
                            <x-utils.link href="#" :title="\Carbon\Carbon::parse($user->email_verified_at)->format('d/m/Y h:i:s A')" class="{{ $user->email_verified_at ? 'bg-green-500' : 'bg-red-500' }} rounded-full px-2 inline-flex text-xs" :text="$user->email_verified_at ? 'Email' : ''" />
                            <x-utils.link href="#" :title="\Carbon\Carbon::parse($user->mobile_verified_at)->format('d/m/Y h:i:s A')" class="{{ $user->mobile_verified_at ? 'bg-green-500' : 'bg-red-500' }} rounded-full px-2 inline-flex text-xs" :text="$user->mobile_verified_at ? 'Mobile' : ''" />
                        </td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                        <td>{!! $user->roles_label !!}</td>
                        <td>{!! $user->permissions_label !!}</td>
                        <td>
                            @include('backend.auth.user.includes.actions')
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-slot>
        <x-slot name="tablePagination">
            <div class="mt-5 table-footer">
                {{ $users->links() }}
            </div>
        </x-slot>
    </x-utils.dynamic-table>
</div>
