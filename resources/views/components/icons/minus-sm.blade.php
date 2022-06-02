@props(['size' => 5, 'color' => 'currentColor', 'class' => ''])
<svg xmlns="http://www.w3.org/2000/svg"
     {{ $attributes->merge(['class' => 'h-' . $size . ' w-' . $size . ' ' . $class]) }} viewBox="0 0 20 20"
     fill="{{ $color }}">
    <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"/>
</svg>
