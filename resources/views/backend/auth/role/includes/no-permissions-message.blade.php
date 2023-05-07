@if ($general->count() + $categories->count() === 0)
    <x-bladewind.alert type="warning">
        @lang('There are no permissions to choose from.')
    </x-bladewind.alert>
@endif
