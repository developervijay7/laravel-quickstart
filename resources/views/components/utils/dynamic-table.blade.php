<div>
    @isset($tableFilters)
        <div x-data="{showFilters: currentScreenWidth >= 768 ? true : false}">
            <div class="py-2">
                <a href="#" class="lg:hidden flex items-center justify-between" @click.prevent="showFilters = !showFilters">
                    <h2 class="text-xl font-bold">Filters</h2>
                    <x-icons.chevron-down />
                </a>
                <div x-show="showFilters" class="lg:flex justify-between items-end">
                    {{ $tableFilters }}
                </div>
            </div>
        </div>
    @endisset
    @isset($tableBody)
        <div class="grid grid-cols-1 overflow-x-auto">
            {{ $tableBody }}
        </div>
    @endisset
    @isset($tablePagination)
        <div class="grid grid-cols-1 overflow-x-auto">
            {{ $tablePagination }}
        </div>
    @endisset
</div>
