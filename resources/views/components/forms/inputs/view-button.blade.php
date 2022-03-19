@props(['href' => '#', 'permission' => false, 'title' => '', 'hideText' => true])

<x-utils.link :href="$href" {{ $attributes->merge(['class' => 'flex items-center']) }} :text="__('View')" permission="{{ $permission }}" title="{{ $title }}" :hideText="$hideText">
    <x-slot name="icon">
        <x-icons.search-circle />
    </x-slot>
</x-utils.link>
