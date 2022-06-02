@props(['size' => 5, 'color' => 'currentColor', 'class' => ''])
<svg xmlns="http://www.w3.org/2000/svg"
     {{ $attributes->merge(['class' => 'h-' . $size . ' w-' . $size . ' ' . $class]) }} viewBox="0 0 20 20"
     fill="{{ $color }}">
    <path fill-rule="evenodd"
          d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z"
          clip-rule="evenodd"/>
</svg>
