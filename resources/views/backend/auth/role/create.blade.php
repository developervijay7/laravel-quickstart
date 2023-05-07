@inject('model', '\App\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create Role'))

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-2">
        <x-forms.post :action="route('admin.auth.role.store')">
            <x-backend.card>
                <x-slot name="header">
                    @lang('Create Role')
                </x-slot>

                <x-slot name="headerActions">
                    <x-utils.link class="" :href="route('admin.auth.role.index')" :text="__('Cancel')">
                        <x-slot name="icon">
                            <x-icons.x />
                        </x-slot>
                    </x-utils.link>
                </x-slot>

                <x-slot name="body">
                    <div x-data="{userType : '{{ $model::TYPE_USER }}'}">
                        <div class="py-2">
                            <label for="type" class="@error('type') text-red-600 dark:text-red-600 @else text-gray-900 dark:text-gray-100 @enderror">@lang('Type*')</label>
                            <select name="type" id="type" x-on:change="userType = $event.target.value" class="rounded w-full appearance-none text-md py-1 px-2 focus:outline-none border-2 border-transparent focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-900 text-purple-900 dark:text-gray-100 placeholder-purple-300 dark:placeholder-gray-600 font-semibold"  required autofocus data-placeholder="Please select user type">
                                <option value="{{ $model::TYPE_USER }}">@lang('User')</option>
                                <option value="{{ $model::TYPE_ADMIN }}">@lang('Administrator')</option>
                            </select>
                        </div>

                        <div class="py-2">
                            <label for="name" class="@error('name') text-red-600 dark:text-red-600 @else text-gray-900 dark:text-gray-100 @enderror">@lang('Permission Name*')</label>
                            <x-bladewind.input type="text" class="w-full rounded" placeholder="{{ __('Name') }}" name="name" id="name" value="{{ old('name') }}" maxlength="100" required />
                        </div>

                        @include('backend.auth.includes.permissions')
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-bladewind.button
                        can_submit="true"
                        color="green">
                        {{ __('Add New Role') }}
                    </x-bladewind.button>
                </x-slot>
            </x-backend.card>
        </x-forms.post>
    </div>
@endsection
