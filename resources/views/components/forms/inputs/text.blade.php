@isset($errors)
    @error($name)
    <input {{ $attributes->merge(['class' => 'appearance-none text-md py-1 px-2 focus:outline-none border-2 focus:ring-red-600 focus:border-blue-600 bg-red-200 text-red-900 placeholder-purple-300 dark:placeholder-gray-600 font-semibold']) }}>
@else
    <input {{ $attributes->merge(['class' => 'appearance-none text-md py-1 px-2 focus:outline-none border-2 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-900 text-purple-900 dark:text-gray-100 placeholder-purple-300 dark:placeholder-gray-600 font-semibold']) }}>
    @enderror
    {{--Error variable is not available on error pages--}}
    @else
        <input {{ $attributes->merge(['class' => 'appearance-none text-md py-1 px-2 focus:outline-none border-2 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-900 text-purple-900 dark:text-gray-100 placeholder-purple-300 dark:placeholder-gray-600 font-semibold']) }}>

    @endisset
