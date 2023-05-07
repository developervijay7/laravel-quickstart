<div class="card bg-white dark:bg-gray-700 px-5 dark:text-white rounded-md mb-5 pb-5">
    @isset($header)
        <div class="card-header flex items-center justify-between border-b py-2 mb-5">
            {{ $header }}
            @isset($headerLinks)
                <div class="">
                    {{ $headerLinks }}
                </div>
            @endisset
            @isset($headerActions)
                <div class="">
                    {{ $headerActions }}
                </div>
            @endisset
        </div>
    @endisset

    @isset($body)
        <div class="card-body">
            {{ $body }}
        </div>
    @endisset

    @isset($footer)
        <div class="card-footer pt-5 mt-5 border-t flex justify-end">
            {{ $footer }}
        </div>
    @endisset
</div>
