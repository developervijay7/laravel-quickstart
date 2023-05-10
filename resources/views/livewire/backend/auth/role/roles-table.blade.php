<div>
    <x-utils.dynamic-table>
        <x-slot name="tableFilters">
            <div class="py-2 col-start-1 col-end-4">
                <label for="search-users">@lang('Search Roles')</label>
                <x-forms.inputs.text wire:model.debounce.300ms="search" type="text" class="w-full rounded" label="{{ __('labels.search') }}" placeholder="Search Roles" name="search" id="search-roles" />
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
            <table class="w-full" id="roles-table">
                <thead class="">
                <tr class="bg-gray-500 dark:bg-gray-800 h-12 text-left">
                    <th wire:click.debounce.1000ms="sortBy('type')" class="{{ $sortBy === 'type' ? ($sortDirection === 'asc' ? 'asc' : 'desc') : 'sortable' }}">Type</th>
                    <th wire:click.debounce.1000ms="sortBy('name')" class="{{ $sortBy === 'name' ? ($sortDirection === 'asc' ? 'asc' : 'desc') : 'sortable' }}">Name</th>
                    <th>Permissions</th>
                    <th wire:click.debounce.1000ms="sortBy('count')" class="{{ $sortBy === 'count' ? ($sortDirection === 'asc' ? 'asc' : 'desc') : 'sortable' }}">Number of Users</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr class="{{ $loop->index %2 === 0 ? 'even' : 'odd' }}">
                        <td>{{ $role->type === 'admin' ? 'Administrator' : 'User' }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{!! $role->permissions_label !!}</td>
                        <td>{{ count($role->users) }}</td>
                        <td>
                            @include('backend.auth.role.includes.actions')
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-slot>
        <x-slot name="tablePagination">
            <div class="mt-5 table-footer">
                {{ $roles->links() }}
            </div>
        </x-slot>
    </x-utils.dynamic-table>
</div>
