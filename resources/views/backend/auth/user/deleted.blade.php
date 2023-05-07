@extends('backend.layouts.app')

@section('title', __('Deleted Users'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Users')
        </x-slot>

        <x-slot name="headerLinks">
           <span x-data="{'showLinks': false}" class="relative text-black dark:text-white">
                <a href="#" class="flex font-bold items-center gap-x-2" id="langPicker" @click.prevent="showLinks = !showLinks" @click.away="showLinks = false">
                   Deleted Users
                   <x-icons.globe />
                </a>
                <div x-show="showLinks" class="absolute top-8 right-0 z-30 bg-gray-100 dark:bg-gray-900 p-2 w-56">
                    <a href="{{ route('admin.auth.user.index') }}" class="mx-5 block {{ activeClass(Route::is('admin.auth.user.index'), 'text-pink-500 font-bold', '') }}">All Users</a>
                    <a href="{{ route('admin.auth.user.deactivated') }}" class="mx-5 block {{ activeClass(Route::is('admin.auth.user.deactivated'), 'text-pink-500 font-bold', '') }}">Deactivated Users</a>
                    <a href="{{ route('admin.auth.user.deleted') }}" class="mx-5 block {{ activeClass(Route::is('admin.auth.user.deleted'), 'text-pink-500 font-bold', '') }}">Deleted Users</a>
                </div>
            </span>
        </x-slot>

        <x-slot name="body">
            <livewire:backend.auth.user.users-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection

@push('before-scripts')
    @livewireScripts
@endpush
@push('after-styles')
    @livewireStyles
@endpush
