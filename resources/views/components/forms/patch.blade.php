<form method="post" {{ $attributes->merge(['action' => '#', 'class' => '']) }}>
    @csrf
    @method('patch')

    {{ $slot }}
</form>
