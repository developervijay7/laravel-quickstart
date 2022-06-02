<label for="{{ $id }}" class="pl-2 text-sm {{ $label ? '' : 'hidden' }} @error($name) text-red-500 @else text-gray-600 dark:text-gray-200 @enderror">{{ $label ?? $name }}</label>
<div class="relative" x-data="{ showPassword: true }">
    @error($name)
    <input :type="showPassword ? 'password' : 'text'" {{ $attributes->merge(['class' => 'appearance-none text-md p-2 focus:outline-none border-2 focus:ring-red-600 focus:border-blue-600 bg-red-200 text-red-900 placeholder-purple-300 dark:placeholder-gray-600 font-semibold']) }}
    required>
    @else
        <input :type="showPassword ? 'password' : 'text'" {{ $attributes->merge(['class' => 'appearance-none text-md p-2 focus:outline-none border-2 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-900 text-purple-900 dark:text-gray-100 placeholder-purple-300 dark:placeholder-gray-600 font-semibold']) }}
        required>
        @enderror
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5" x-cloak>
            <x-icons.eye class="text-gray-700" ::class="{'hidden': !showPassword, 'block':showPassword }" @click="showPassword = !showPassword"/>
            <x-icons.eye-off class="text-gray-700" ::class="{'block': !showPassword, 'hidden':showPassword }" @click="showPassword = !showPassword"/>
        </div>
</div>
