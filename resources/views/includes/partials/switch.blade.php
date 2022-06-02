<div x-cloak class="flex items-center">
    <button x-show="currentTheme === 'dark'" @click="currentTheme = 'system'" title="{{ __('labels.dark-mode') }}" x-cloak>
        <x-icons.moon
            class="p-1 w-8 h-8 text-gray-100 bg-gray-900 rounded-md transition cursor-pointer dark:hover:bg-gray-600"/>
    </button>

    <button x-show="currentTheme === 'light'" @click="currentTheme = 'dark'" title="{{ __('labels.light-mode') }}" x-cloak>
        <x-icons.sun
            class="p-1 w-8 h-8 text-gray-700 bg-gray-300 rounded-md transition cursor-pointer hover:bg-gray-200"/>
    </button>

    <button x-show="currentTheme === 'system'" x-cloak
            @click="window.matchMedia('(prefers-color-scheme: dark)').matches ? currentTheme = 'light' : currentTheme = 'dark'" title="{{ __('labels.system-mode') }}">
        <x-icons.desktop-computer x-show="! window.matchMedia('(prefers-color-scheme: dark)').matches"
                                  class="p-1 w-8 h-8 text-gray-700 bg-gray-300 rounded-md transition cursor-pointer hover:bg-gray-200"/>
        <x-icons.desktop-computer x-show="window.matchMedia('(prefers-color-scheme: dark)').matches"
                                  class="p-1 w-8 h-8 text-gray-100 bg-gray-900 rounded-md transition cursor-pointer dark:hover:bg-gray-600"/>
    </button>
</div>
