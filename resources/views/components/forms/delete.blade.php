<form method="post" {{ $attributes->merge(['action' => '#', 'class' => '']) }}>
    @csrf
    @method('delete')

    {{ $slot }}
</form>
