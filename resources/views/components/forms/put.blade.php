<form method="post" {{ $attributes->merge(['action' => '#', 'class' => '']) }}>
    @csrf
    @method('put')

    {{ $slot }}
</form>
