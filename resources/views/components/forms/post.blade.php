<form method="post" {{ $attributes->merge(['action' => '#', 'class' => '']) }}>
    @csrf

    {{ $slot }}
</form>
