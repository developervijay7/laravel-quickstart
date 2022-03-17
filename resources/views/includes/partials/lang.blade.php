@if(config('quickstart.locale.status') && count(config('quickstart.locale.languages')) > 1)
    <span x-data="{'showLang': false}" class="relative text-black dark:text-white">
    <x-utils.link :text="__(getLocaleName(app()->getLocale()))" id="langPicker" @click.prevent="showLang = !showLang"
                  @click.away="showLang = false" aria-expanded="true" aria-haspopup="true">
        <x-slot name="icon">
            <span
                class="flag-icon flag-icon-{{ config('quickstart.locale.languages')[app()->getLocale()]['flag'] }}"></span>
        </x-slot>
    </x-utils.link>
    <div x-show="showLang"
         class="absolute top-14 left-0 mt-2 w-48 rounded-md shadow-lg z-90 bg-gray-100 dark:bg-gray-900 ring-1 ring-black ring-opacity-5 focus:outline-none px-4"
         role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        @foreach(collect(config('quickstart.locale.languages'))->sortBy('name') as $code => $details)
            @if($code !== app()->getLocale())
                <x-utils.link href="{{ route('locale.change', $code) }}" :text="__(getLocaleName($code))"
                              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2" role="menuitem"
                              tabindex="-1">
                    <x-slot name="icon">
                        <span class="flag-icon flag-icon-{{ $details['flag'] }}"></span>
                    </x-slot>
                </x-utils.link>
            @endif
        @endforeach
    </div>
</span>
@endif
