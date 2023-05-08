@props(['action' => '#', 'text' => __('Delete'), 'permission' => false, 'title' => 'Delete Item', 'class' => '', 'name' => 'delete-item', 'hideText' => true])
<x-utils.form-button action="{{ $action }}" method="delete" name="{{ $name }}" {{ $attributes->merge(['class' => $class . ' bg-red-500']) }} title="{{ $title }}" permission="{{ $permission }}" :hideText="$hideText">
    {{ $text }}
    <x-slot name="icon">
        <x-icons.trash />
    </x-slot>
</x-utils.form-button>
