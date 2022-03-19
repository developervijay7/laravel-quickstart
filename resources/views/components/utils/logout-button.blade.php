@props(['action' => '#', 'text' => __('Logout'), 'permission' => false, 'title' => 'Logout Now', 'class' => '', 'hideText' => true])
<x-utils.form-button :action="$action" method="post" name="logout-form" {{ $attributes->merge(['class' => $class]) }} title="{{ $title }}" :hideText="$hideText">
    <div>{{ $text }}</div>
    @isset($icon)
        <x-slot name="icon">
            {!! $icon !!}
        </x-slot>
    @endisset
</x-utils.form-button>
