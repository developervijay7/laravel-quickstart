@extends('log-viewer::adminator._master')

<?php /** @var  Illuminate\Pagination\LengthAwarePaginator  $rows */ ?>

@push('logpage-title')
    @lang('View Logs List')
@endpush

@section('log-content')
    <div class="grid grid-cols-1 py-5 overflow-x-auto">
        <table class="w-full">
            <thead>
            <tr>
                @foreach($headers as $key => $header)
                    <th scope="col" class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                        @if ($key == 'date')
                            <span>{{ $header }}</span>
                        @else
                            <span class="level-{{ $key }} px-2 rounded inline-flex items-center">
                            @include('log-viewer::adminator.icon-maker', ['icon' => $key, 'size' => 5]) <span class="ml-1">{{ $header }}</span>
                        </span>
                        @endif
                    </th>
                @endforeach
                <th scope="col">@lang('Actions')</th>
            </tr>
            </thead>
            <tbody>
            @forelse($rows as $date => $row)
                <tr class="{{ $loop->index % 2 === 0 ? 'even' : 'odd' }}">
                    @foreach($row as $key => $value)
                        <td class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                            @if ($key == 'date')
                                <span>{{ \Carbon\Carbon::parse($value)->format('d/m/Y') }}</span>
                            @elseif ($value == 0)
                                <span>{{ $value }}</span>
                            @else
                                <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                                    <span class="{{ $key }}">{{ $value }}</span>
                                </a>
                            @endif
                        </td>
                    @endforeach
                    <td class="text-right flex space-x-5 pr-2 items-center py-1">
                        <a href="{{ route('log-viewer::logs.show', [$date]) }}" class="p-1 bg-blue-500 rounded">
                            <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                            </svg>
                        </a>
                        <a href="{{ route('log-viewer::logs.download', [$date]) }}" class="p-1 bg-green-500 rounded">
                            <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                            </svg>
                        </a>
                        <form id="deleteLogForm" method="POST" action="{{ route('log-viewer::logs.delete') }}">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="date" value="{{ $date }}">
                            <button type="submit" class="inline flex p-1 bg-red-500 rounded" @click.prevent="deleteConfirm($el)">
                                <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center">
                        <span>@lang('The list of logs is empty!')</span>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $rows->render() }}
@endsection

@push('before-logscripts')
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
                                location.reload();
                            }
                            else {
                                alert('AJAX ERROR ! Check the console !');
                                console.error(data);
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
    </script>
@endpush
