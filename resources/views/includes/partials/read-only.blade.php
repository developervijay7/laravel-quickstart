@readonly
<x-utils.alert type="primary" :dismissible="true">
    {{ __('The Application is currently in read only mode. All requests other than GET are disabled.') }}
</x-utils.alert>
@endreadonly
