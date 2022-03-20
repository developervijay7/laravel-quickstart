@extends('log-viewer::adminator._master')

@push('logpage-title')
    @lang('Log Stats')
@endpush

@section('log-content')
    <div class="grid grid-cols-1 xl:grid-cols-4 gap-5 p-5">
        <div class="xl:col-span-1">
            <canvas id="stats-doughnut-chart" height="300"></canvas>
        </div>

        <div class="xl:col-span-3">
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">
                @foreach($percents as $level => $item)
                    <div class="flex items-center rounded p-2 level-{{ $level }} ">
                        <div class="border-r pr-1">
                            @include('log-viewer::adminator.icon-maker', ['icon' => $level, 'size' => 12])
                        </div>
                        <div class="ml-3">
                            <div class="text-2xl">{{ $item['name'] }}</div>
                            <div>
                                {{ $item['count'] }} @lang('entries') - {!! $item['percent'] !!} %
                            </div>
                            <div class="relative pt-1">
                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-400">
                                    <div style="width: {{ $item['percent'] }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-900"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('before-logscripts')
    <script>
        $(function() {
            new Chart(document.getElementById("stats-doughnut-chart"), {
                type: 'doughnut',
                data: {!! $chartData !!},
                options: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontColor: "black",
                        },
                    }
                }
            });
        });
    </script>
@endpush
