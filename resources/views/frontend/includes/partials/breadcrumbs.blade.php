@if (Breadcrumbs::has() && !Route::is('frontend.index'))
    <nav id="breadcrumbs" class="font-bold text-purple-900 dark:text-gray-100" aria-label="Breadcrumb">
        <ol class="list-none p-0 inline-flex flex-wrap" itemscope itemtype="https://schema.org/BreadcrumbList">
            @foreach (Breadcrumbs::current() as $crumb)
                @if ($crumb->url() && !$loop->last)
                    <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="{{ $crumb->url() }}" itemprop="item">
                            <span itemprop="name">{{ $crumb->title() }}</span>
                        </a>
                        <meta itemprop="position" content="{{ $loop->index+1 }}"/>
                        <svg class="fill-current w-3 h-3 mx-3" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                    </li>
                @else
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" aria-current="page">
                        <span class="text-purple-400 dark:text-gray-500" itemprop="name">{{ $crumb->title() }}</span>
                        <meta itemprop="position" content="{{ $loop->index+1 }}"/>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
