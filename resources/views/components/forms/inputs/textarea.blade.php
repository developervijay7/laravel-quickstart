@isset($errors)
    @error($name)
    <textarea {{ $attributes->merge(['class' => 'text-md py-1 px-2 focus:outline-none border-2 focus:border-blue-600 bg-red-200 text-red-900 placeholder-purple-300 dark:placeholder-gray-600 font-semibold']) }}>{{ $value ?? '' }}</textarea>
@else
    <textarea {{ $attributes->merge(['class' => 'text-md py-1 px-2 focus:outline-none border-2 focus:border-blue-600 bg-purple-50 dark:bg-gray-900 text-purple-900 dark:text-gray-100 placeholder-purple-300 dark:placeholder-gray-600 font-semibold']) }}>{{ $value ?? '' }}</textarea>
    @enderror
    {{--Error variable is not available on error pages--}}
    @else
        <textarea {{ $attributes->merge(['class' => 'text-md py-1 px-2 focus:outline-none border-2 focus:border-blue-600 bg-purple-50 dark:bg-gray-900 text-purple-900 dark:text-gray-100 placeholder-purple-300 dark:placeholder-gray-600 font-semibold']) }}>{{ $value ?? '' }}</textarea>
    @endif
