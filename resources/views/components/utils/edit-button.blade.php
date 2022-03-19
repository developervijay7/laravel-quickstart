@props(['href' => '#', 'permission' => false, 'title' => 'Edit Item', 'hideText' => true])
<x-utils.link :href="$href" {{ $attributes->merge(['class' => 'flex items-center']) }} :text="__('Edit')" permission="{{ $permission }}" title="{{ $title }}" :hideText="$hideText">
    <x-slot name="icon">
        <x-icons.pencil />
    </x-slot>
</x-utils.link>
