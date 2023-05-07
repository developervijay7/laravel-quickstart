@extends('backend.layouts.app')

@section('title', __('User Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('User Management')
        </x-slot>

        <x-slot name="headerLinks">
            <span x-data="{'showLinks': false}" class="relative text-black dark:text-white">
                <a href="#" class="flex font-bold items-center gap-x-2" id="langPicker" @click.prevent="showLinks = !showLinks" @click.away="showLinks = false">
                   All Users
                   <x-icons.globe />
                </a>
                <div x-show="showLinks" class="absolute top-8 right-0 z-30 bg-gray-100 dark:bg-gray-900 p-2 w-56">
                    <a href="{{ route('admin.auth.user.index') }}" class="mx-5 block {{ activeClass(Route::is('admin.auth.user.index'), 'text-pink-500 font-bold', '') }}">All Users</a>
                    <a href="{{ route('admin.auth.user.deactivated') }}" class="mx-5 block {{ activeClass(Route::is('admin.auth.user.deactivated'), 'text-pink-500 font-bold', '') }}">Deactivated Users</a>
                    <a href="{{ route('admin.auth.user.deleted') }}" class="mx-5 block {{ activeClass(Route::is('admin.auth.user.deleted'), 'text-pink-500 font-bold', '') }}">Deleted Users</a>
                </div>
            </span>
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link :href="route('admin.auth.user.create')" :text="__('Create User')" title="Add New User">
                    <x-slot name="icon">
                        <x-icons.plus-circle />
                    </x-slot>
                </x-utils.link>
            </x-slot>
        @endif

        <x-slot name="body">
            <div class="grid grid-cols-1" x-data="{activeTab: window.location.hash ? window.location.hash.substring(1) : 'list' }">
                <div class="overflow-x-auto">
                    <ul class="list-reset flex border-b dark:text-gray-900 text-sm md:text-base overscroll-x-contain" id="userTab" role="tablist">
                        <li class="mr-1">
                            <a class="bg-white dark:bg-gray-700 dark:text-white inline-block py-2 px-2 md:px-4 rounded-t-lg" :class="activeTab==='list' ? 'text-blue-dark border-l border-t border-r rounded-t font-semibold' : 'text-blue hover:text-blue-darker'" href="#" role="tab" aria-controls="list" aria-selected="true" @click.prevent="activeTab = 'list'; window.location.hash = 'list'">Users List</a>
                        </li>
                        <li class="mr-1">
                            <a class="bg-white dark:bg-gray-700 dark:text-white inline-block py-2 px-2 md:px-4 rounded-t-lg" :class="activeTab==='cards' ? 'text-blue-dark border-l border-t border-r rounded-t font-semibold' : 'text-blue hover:text-blue-darker'" href="#" role="tab" aria-controls="cards" aria-selected="true" @click.prevent="activeTab = 'cards'; window.location.hash = 'cards'">Users Cards</a>
                        </li>
                    </ul>
                </div>
                <div x-show="activeTab === 'list'">
                    <livewire:backend.auth.user.users-table />
                </div>
                <div x-show="activeTab === 'cards'">

                </div>
            </div>
        </x-slot>
    </x-backend.card>
@endsection
