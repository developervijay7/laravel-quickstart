@if ($general->count() + $categories->count() === 0)
    <x-utils.alert type="warning">
        @lang('There are no permissions to choose from.')
    </x-utils.alert>
@endif
