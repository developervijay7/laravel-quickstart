@extends('backend.layouts.app')

@section('title', __(appName() . ' Logs Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @stack('logpage-title')
        </x-slot>

        <x-slot name="body">
            <div class="grid grid-cols-1">
                <div class="overflow-x-auto">
                    <ul class="list-reset flex border-b dark:text-gray-900 text-sm md:text-base overscroll-x-contain" id="logTab" role="tablist">
                        <li class="mr-1">
                            <a class="bg-gray-200 dark:bg-gray-600 dark:text-white inline-block py-2 px-2 md:px-4 rounded-t-lg {{ Route::is('log-viewer::dashboard') ? 'text-blue-dark border-l border-t border-r rounded-t font-semibold' : 'text-blue hover:text-blue-darker' }}" href="{{ route('log-viewer::dashboard') }}" role="tab" aria-controls="list" aria-selected="true">@lang('Log Stats')</a>
                        </li>
                        <li class="mr-1">
                            <a class="bg-gray-200 dark:bg-gray-600 dark:text-white inline-block py-2 px-2 md:px-4 rounded-t-lg {{ Route::is('log-viewer::logs.list') || Route::is('log-viewer::logs.show') ? 'text-blue-dark border-l border-t border-r rounded-t font-semibold' : 'text-blue hover:text-blue-darker' }}" href="{{ route('log-viewer::logs.list') }}" role="tab" aria-controls="cards" aria-selected="true">@lang('Log Viewer')</a>
                        </li>
                    </ul>
                </div>
            </div>
            @yield('log-content')
        </x-slot>
    </x-backend.card>
@endsection

@push('after-scripts')
    @stack('before-logscripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    @stack('after-logscripts')
@endpush

@push('after-styles')
    <style>
        .env,
        .level-all,
        .level-emergency,
        .level-alert,
        .level-critical,
        .level-error,
        .level-warning,
        .level-notice,
        .level-info,
        .level-debug,
        .empty {
            color: #FFF !important;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3) !important;
        }
        .level-all {
            background-color: {{ log_styler()->color('all') }};
        }
        .level-emergency {
            background-color: {{ log_styler()->color('emergency') }};
        }
        .level-alert  {
            background-color: {{ log_styler()->color('alert') }};
        }
        .level-critical {
            background-color: {{ log_styler()->color('critical') }};
        }
        .level-error {
            background-color: {{ log_styler()->color('error') }};
        }
        .level-warning {
            background-color: {{ log_styler()->color('warning') }};
        }
        .level-notice {
            background-color: {{ log_styler()->color('notice') }};
        }
        .level-info {
            background-color: {{ log_styler()->color('info') }};
        }
        .level-debug {
            background-color: {{ log_styler()->color('debug') }};
        }
        .empty {
            background-color: {{ log_styler()->color('empty') }};
        }
        .env {
            background-color: #6A1B9A;
        }
        #entries {
            overflow-wrap: anywhere;
        }
        .stack-content {
            color: #AE0E0E;
            font-family: consolas, Menlo, Courier, monospace;
            white-space: pre-line;
            font-size: .8rem;
        }
    </style>
@endpush
