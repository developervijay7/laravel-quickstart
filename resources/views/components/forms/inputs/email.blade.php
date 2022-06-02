<label for="{{ $id }}" class="pl-2 text-sm {{ $label ? '' : 'hidden' }} @error($name) text-red-500 @else text-gray-600 dark:text-gray-200 @enderror">{{ $label ?? $name }}</label>
@isset($errors)
    @error($name)
    <input id="{{ $id }}" name="{{ $name }}" type="email" {{ $attributes->merge(['class' => 'appearance-none text-md p-2 focus:outline-none border-2 focus:ring-red-600 focus:border-blue-600 bg-red-200 text-red-900 placeholder-purple-300 dark:placeholder-gray-600 font-semibold']) }}>
@else
    <input id="{{ $id }}" name="{{ $name }}" type="email" {{ $attributes->merge(['class' => 'appearance-none text-md p-2 focus:outline-none border-2 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-900 text-purple-900 dark:text-gray-100 placeholder-purple-300 dark:placeholder-gray-600 font-semibold']) }}>
    @enderror
    @else {{--Error variable is not available on error pages--}}
    <input id="{{ $id }}" name="{{ $name }}" type="email" {{ $attributes->merge(['class' => 'appearance-none text-md p-2 focus:outline-none border-2 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-900 text-purple-900 dark:text-gray-100 placeholder-purple-300 dark:placeholder-gray-600 font-semibold']) }}>
@endisset
