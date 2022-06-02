@props(['class' => '', 'text' => '', 'hide' => false, 'icon' => false, 'permission' => false, 'title' => '', 'hideText' => true,])
@if ($permission)
    @if ($logged_in_user->can($permission))
        @if (!$hide)
            <a {{ $attributes->merge(['href' => '#', 'class' => $class . ' flex items-center', 'title' => $title]) }}>
                @isset($icon)
                    {!! $icon !!}
                @endisset
                <span
                    class="{{ $hideText ? 'hidden md:block md:mx-2' : '' }}">{{ strlen($text) ? $text : $slot }}</span>
            </a>
        @endif
    @endif
@else
    @if (!$hide)
        <a {{ $attributes->merge(['href' => '#', 'class' => $class . ' flex items-center', 'title' => $title]) }}>
            @isset($icon)
                {!! $icon !!}
            @endisset
            <span class="{{ $hideText ? 'hidden md:block md:mx-2' : '' }}">{{ strlen($text) ? $text : $slot }}</span>
        </a>
    @endif
@endif
