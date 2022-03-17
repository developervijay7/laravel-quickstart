@if(config('quickstart.locale.status') && count(config('quickstart.locale.languages')) > 1)
    <button x-data="{'showLang': false}" class="relative flex items-center rounded-md bg-gray-300 dark:bg-gray-900 py-1 px-3">
        <x-utils.link :text="__(getLocaleName(app()->getLocale()))" id="langPicker" @click.prevent="showLang = !showLang"
                      @click.away="showLang = false" aria-expanded="true" aria-haspopup="true">
            <x-slot name="icon">
                <span
                    class="flag-icon flag-icon-{{ config('quickstart.locale.languages')[app()->getLocale()]['flag'] }}"></span>
            </x-slot>
        </x-utils.link>
        <x-icons.chevron-down :size="5" class="transform transition origin-center duration-250" ::class="showLang ? '-rotate-180' : ''" />
        <ul x-show="showLang"
             class="absolute top-14 right-0 md:left-0 mt-2 w-48 rounded-md shadow-lg z-90 bg-gray-200 dark:bg-gray-600 ring-1 ring-black ring-opacity-5 focus:outline-none"
             role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            @foreach(collect(config('quickstart.locale.languages'))->sortBy('name') as $code => $details)
                @if($code !== app()->getLocale())
                    <li>
                        <x-utils.link href="{{ route('locale.change', $code) }}" :text="__(getLocaleName($code))"
                                      class="text-sm hover:bg-accent hover:text-white text-gray-700 block py-2 mx-0 px-6" role="menuitem"
                                      tabindex="-1">
                            <x-slot name="icon">
                                <span class="flag-icon flag-icon-{{ $details['flag'] }}"></span>
                            </x-slot>
                        </x-utils.link>
                    </li>
                @endif
            @endforeach
        </ul>
    </button>
@endif
