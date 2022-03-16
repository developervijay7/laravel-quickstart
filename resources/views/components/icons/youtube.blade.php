@props(['size' => 5, 'color' => 'currentColor', 'class' => ''])
<svg xmlns="http://www.w3.org/2000/svg"
     {{ $attributes->merge(['class' => 'h-' . $size . ' w-' . $size . ' ' . $class]) }} viewBox="0 0 20 20"
     fill="{{ $color }}">
    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    <rect x="3" y="5" width="18" height="14" rx="4"></rect>
    <path d="M10 9l5 3l-5 3z"></path>
</svg>
