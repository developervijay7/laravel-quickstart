@props(['action' => '#', 'method' => 'POST', 'name' => '', 'class' => '', 'icon' => false, 'permission' => false, 'title' => '', 'hideText' => true,])
@if($permission)
    @if($logged_in_user->can($permission))
        <form method="POST" action="{{ $action }}" name="{{ $name }}">
            @csrf
            @method($method)
            <button type="submit" {{ $attributes->merge(['class' => $class . ' flex items-center w-full', 'title' => $title]) }}>
                @isset($icon)
                    {!! $icon !!}
                @endisset
                <span class="{{ $hideText ? 'hidden md:block' : '' }}">{{ $slot }}</span>
            </button>
        </form>
    @endif
@else
    <form method="POST" action="{{ $action }}" name="{{ $name }}">
        @csrf
        @method($method)
        <button type="submit" {{ $attributes->merge(['class' => $class . ' flex items-center w-full', 'title' => $title]) }}>
            @isset($icon)
                {!! $icon !!}
            @endisset
            <span class="{{ $hideText ? 'hidden md:block' : '' }}">{{ $slot }}</span>
        </button>
    </form>
@endif
