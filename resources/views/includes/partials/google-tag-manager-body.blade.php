@if(config('quickstart.google_tag_manager'))
    @production
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id={{ config('quickstart.google_tag_manager') }}" height="0" width="0"
                    style="display:none;visibility:hidden"></iframe>
        </noscript>
    @endproduction
@endif
