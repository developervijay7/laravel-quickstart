<form method="get" {{ $attributes->merge(['action' => '#', 'class' => '']) }}>
    {{ $slot }}
</form>
