<?php
/**
 * @var  Arcanedev\LogViewer\Entities\Log            $log
 * @var  Illuminate\Pagination\LengthAwarePaginator  $entries
 * @var  string|null                                 $query
 */
?>

@extends('log-viewer::adminator._master')

@push('logpage-title')
    @lang('Log Dated: ') [{{ \Carbon\Carbon::parse($log->date)->format('d/m/Y') }}]
@endpush

@section('log-content')
    <div class="grid grid-cols-1 xl:grid-cols-7 2xl:gap-x-5">
        <div class="xl:col-span-1 xl:py-5">
            {{-- Log Menu --}}
            <div>
                <h3 class="bg-gray-600 rounded-t px-5 py-3 text-lg font-black">@lang('Levels')</div>
            <div class="">
                @foreach($log->menu() as $levelKey => $item)
                    @if ($item['count'] === 0)
                        <div>
                            <div class="flex justify-between 2xl:px-5 py-3 border">
                                    <span class="level-{{ $levelKey }} flex items-center rounded px-2 py-0.5">
                                        <span>@include('log-viewer::adminator.icon-maker', ['icon' => $levelKey, 'size' => 6])</span>
                                        <span class="ml-1">{{ $item['name'] }}</span>
                                    </span>
                                <span class="empty rounded-full px-2 py-0.5">{{ $item['count'] }}</span>
                            </div>
                        </div>
                    @else
                        <div>
                            <a href="{{ $item['url'] }}" class="flex justify-between 2xl:px-5 py-3 border">
                                    <span class="level-{{ $levelKey }} {{ $level === $levelKey ? ' active' : ''}} flex items-center rounded px-2 py-0.5">
                                         <span>@include('log-viewer::adminator.icon-maker', ['icon' => $levelKey, 'size' => 6])</span>
                                         <span class="ml-1">{{ $item['name'] }}</span>
                                    </span>
                                <span class="level-{{ $levelKey }} rounded-full px-2 py-0.5">{{ $item['count'] }}</span>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="xl:col-span-6">
            {{-- Log Details --}}
            <div class="my-5">
                <div class="bg-gray-200 dark:bg-gray-800 flex justify-between px-5 py-3">
                    <div>@lang('Log info') :</div>
                    <div class="flex space-x-5">
                        <a href="{{ route('log-viewer::logs.download', [$log->date]) }}" class="flex items-center rounded bg-green-500 px-2 py-0.5">
                            <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                            </svg>
                            <span class="ml-1">@lang('Download')</span>
                        </a>
                        <form id="deleteLogForm" method="POST" action="{{ route('log-viewer::logs.delete') }}">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="date" value="{{ $log->date }}">
                            <button type="submit" class="flex items-center rounded bg-red-500 px-2 py-0.5" @click.prevent="deleteConfirm($el)">
                                <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path>
                                </svg>
                                <span class="ml-1"></span>@lang('Delete')</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="grid grid-cols-1 overflow-x-auto">
                    <table class="w-full">
                        <tbody>
                        <tr class="odd">
                            <td class="p-2">@lang('File path') :</td>
                            <td class="p-2" colspan="7">{{ $log->getPath() }}</td>
                        </tr>
                        <tr class="even">
                            <td class="p-2">@lang('Log entries') :</td>
                            <td class="p-2">
                                <span class="bg-blue-600 rounded px-2 py-0.5">{{ $entries->total() }}</span>
                            </td>
                            <td class="p-2">@lang('Size') :</td>
                            <td class="p-2">
                                <span class="bg-blue-600 rounded px-2 py-0.5 flex-nowrap inline-flex">{{ $log->size() }}</span>
                            </td>
                            <td class="p-2">@lang('Created at') :</td>
                            <td class="p-2">
                                <span class="bg-blue-600 rounded px-2 py-0.5 flex-nowrap inline-flex">{{ \Carbon\Carbon::parse($log->createdAt())->format('d/m/Y h:i:s A') }}</span>
                            </td>
                            <td class="p-2">@lang('Updated at') :</td>
                            <td class="p-2">
                                <span class="bg-blue-600 rounded px-2 py-0.5 flex-nowrap inline-flex">{{ \Carbon\Carbon::parse($log->updatedAt())->format('d/m/Y h:i:s A') }}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bg-gray-200 dark:bg-gray-800">
                    {{-- Search --}}
                    <form action="{{ route('log-viewer::logs.search', [$log->date, $level]) }}" method="GET">
                        <div class="flex py-3 px-5">
                            <input id="query" name="query" class="text-black dark:text-white dark:bg-gray-700 px-5 py-2 w-full" value="{{ $query }}" placeholder="@lang('Type here to search')">
                            <div class="flex">
                                @unless (is_null($query))
                                    <a href="{{ route('log-viewer::logs.show', [$log->date]) }}" class="flex bg-gray-500 items-center flex-shrink-0">
                                        <span>(@lang(':count results', ['count' => $entries->count()]))</span>
                                        <svg class="w-5 h-5" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                            <path d="M4.5 4.5l6 6m-6 0l6-6" stroke="currentColor"></path>
                                        </svg>
                                    </a>
                                @endunless
                                <button id="search-btn" class="bg-blue-500 p-2">
                                    <svg class="w-5 h-5" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path d="M416 448L319 351Q277 383 224 383 181 383 144 362 107 340 86 303 64 266 64 223 64 180 86 143 107 106 144 85 181 63 224 63 267 63 304 85 341 106 363 143 384 180 384 223 384 277 351 319L448 416 416 448ZM223 336Q270 336 303 303 335 270 335 224 335 177 303 145 270 112 223 112 177 112 144 145 111 177 111 224 111 270 144 303 177 336 223 336Z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Log Entries --}}
            <div class="my-5">
                @if ($entries->hasPages())
                    <div class="bg-gray-200 dark:bg-gray-800 flex justify-end px-5 py-3 my-2">
                        <span class="ml-auto bg-green-500 px-2 py-0.5 rounded">{{ __('Page :current of :last', ['current' => $entries->currentPage(), 'last' => $entries->lastPage()]) }}</span>
                    </div>
                @endif
                <div class="grid grid-cols-1 overflow-x-auto">
                    <table id="entries" class="w-full">
                        <thead>
                        <tr class="bg-gray-500 dark:bg-gray-800 h-12 text-left">
                            <th class="pl-2" style="width: 120px;">@lang('ENV')</th>
                            <th style="width: 120px;">@lang('Level')</th>
                            <th style="width: 120px;">@lang('Time')</th>
                            <th>@lang('Header')</th>
                            <th style="width: 120px;">@lang('Actions')</th>
                        </tr>
                        </thead>
                        @forelse($entries as $key => $entry)
                            <tbody x-data="{ showStack: false, showContent: false }">
                            <?php /** @var  Arcanedev\LogViewer\Entities\LogEntry  $entry */ ?>
                            <tr class="border {{ $loop->index % 2 === 0 ? 'even' : 'odd' }}">
                                <td class="p-2">
                                    <span class="env rounded px-2 py-0.5">{{ $entry->env }}</span>
                                </td>
                                <td class="p-2">
                                        <span class="level-{{ $entry->level }} rounded px-2 py-0.5 inline-flex items-center">
                                            @include('log-viewer::adminator.icon-maker', ['icon' => $entry->level, 'size' => 4])
                                            <span class="pl-1">{{ $entry->level }}</span>
                                        </span>
                                </td>
                                <td class="p-2">
                                        <span class="secondary">
                                            {{ $entry->datetime->format('H:i:s') }}
                                        </span>
                                </td>
                                <td class="p-2">
                                    {{ $entry->header }}
                                </td>
                                <td class="text-right p-2">
                                    @if ($entry->hasStack())
                                        <a class="flex items-center" role="button" href="#log-stack-{{ $key }}" aria-expanded="false" aria-controls="log-stack-{{ $key }}" @click.prevent="showStack = !showStack">
                                            <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" x-show="!showStack">
                                                <path d="M384 64H192C85.961 64 0 149.961 0 256s85.961 192 192 192h192c106.039 0 192-85.961 192-192S490.039 64 384 64zM64 256c0-70.741 57.249-128 128-128 70.741 0 128 57.249 128 128 0 70.741-57.249 128-128 128-70.741 0-128-57.249-128-128zm320 128h-48.905c65.217-72.858 65.236-183.12 0-256H384c70.741 0 128 57.249 128 128 0 70.74-57.249 128-128 128z"></path>
                                            </svg>
                                            <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" x-show="showStack">
                                                <path d="M384 64H192C86 64 0 150 0 256s86 192 192 192h192c106 0 192-86 192-192S490 64 384 64zm0 320c-70.8 0-128-57.3-128-128 0-70.8 57.3-128 128-128 70.8 0 128 57.3 128 128 0 70.8-57.3 128-128 128z"></path>
                                            </svg>
                                            <span class="ml-1">@lang('Stack')</span>
                                        </a>
                                    @endif

                                    @if ($entry->hasContext())
                                        <a class="flex items-center" role="button" href="#log-context-{{ $key }}" aria-expanded="false" aria-controls="log-context-{{ $key }}" @click.prevent="showContent = !showContent">
                                            <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" x-show="!showContent">
                                                <path d="M384 64H192C85.961 64 0 149.961 0 256s85.961 192 192 192h192c106.039 0 192-85.961 192-192S490.039 64 384 64zM64 256c0-70.741 57.249-128 128-128 70.741 0 128 57.249 128 128 0 70.741-57.249 128-128 128-70.741 0-128-57.249-128-128zm320 128h-48.905c65.217-72.858 65.236-183.12 0-256H384c70.741 0 128 57.249 128 128 0 70.74-57.249 128-128 128z"></path>
                                            </svg>
                                            <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" x-show="showContent">
                                                <path d="M384 64H192C86 64 0 150 0 256s86 192 192 192h192c106 0 192-86 192-192S490 64 384 64zm0 320c-70.8 0-128-57.3-128-128 0-70.8 57.3-128 128-128 70.8 0 128 57.3 128 128 0 70.8-57.3 128-128 128z"></path>
                                            </svg>
                                            <span class="ml-1">@lang('Context')</span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @if ($entry->hasStack() || $entry->hasContext())
                                <tr class="border bg-gray-300">
                                    <td colspan="5" class="stack py-0">
                                        @if ($entry->hasStack())
                                            <div class="stack-content p-5" id="log-stack-{{ $key }}" x-show="showStack">
                                                {!! $entry->stack() !!}
                                            </div>
                                        @endif

                                        @if ($entry->hasContext())
                                            <div class="stack-content p-5" id="log-context-{{ $key }}" x-show="showContent">
                                                <pre>{{ $entry->context() }}</pre>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        @empty
                            <tbody>
                            <tr>
                                <td colspan="5" class="text-center">
                                    <span class="badge badge-secondary">@lang('The list of logs is empty!')</span>
                                </td>
                            </tr>
                            </tbody>
                        @endforelse
                    </table>
                </div>
            </div>

            {!! $entries->appends(compact('query'))->links('vendor.pagination.tailwind') !!}
        </div>
    </div>
@endsection

@push('after-logscripts')
    <script>
        function deleteConfirm(element) {
            Swal.fire({
                title: 'Are you sure you want to permanently delete this item?',
                showCancelButton: true,
                confirmButtonText: 'Confirm Permanent Delete',
                cancelButtonText: 'Cancel',
                icon: 'warning'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:      $(element).closest('form').attr('action'),
                        type:     $(element).closest('form').attr('method'),
                        dataType: 'json',
                        data:     $(element).closest('form').serialize(),
                        success: function(data) {
                            if (data.result === 'success') {
                                location.replace("{{ route('log-viewer::logs.list') }}");
                            }
                            else {
                                alert('OOPS ! This is a lack of coffee exception !')
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            alert('AJAX ERROR ! Check the console !');
                            console.error(errorThrown);
                        }
                    });
                    return false;
                }
            });
        }
        $(function () {
            @unless (empty(log_styler()->toHighlight()))
            @php
                $htmlHighlight = version_compare(PHP_VERSION, '7.4.0') >= 0
                    ? join('|', log_styler()->toHighlight())
                    : join(log_styler()->toHighlight(), '|');
            @endphp
            $('.stack-content').each(function() {
                var $this = $(this);
                var html = $this.html().trim().replace(/({!! $htmlHighlight !!})/gm, '<strong>$1</strong>');
                $this.html(html);
            });
            @endunless
        });
    </script>
@endpush
