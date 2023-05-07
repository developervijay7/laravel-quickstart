@extends('backend.layouts.app')

@section('title', __('Role Management'))

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-4">
        <div class="xl:col-span-3">
            <x-backend.card>
                <x-slot name="header">
                    @lang('Role Management')
                </x-slot>

                <x-slot name="headerActions">
                    <x-utils.link :href="route('admin.auth.role.create')" :text="__('Create Role')">
                        <x-slot name="icon">
                            <x-icons.plus-circle />
                        </x-slot>
                    </x-utils.link>
                </x-slot>

                <x-slot name="body">
                    <div class="">
                        <livewire:backend.auth.role.roles-table />
                    </div>
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection



@push('before-scripts')
    @livewireScripts
@endpush
@push('after-styles')
    @livewireStyles
@endpush

