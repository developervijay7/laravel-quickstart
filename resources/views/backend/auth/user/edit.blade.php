@inject('model', '\App\Models\User')

@extends('backend.layouts.app')

@section('title', __('Update User'))

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-2">
        <x-forms.patch :action="route('admin.auth.user.update', $user)">
            <x-backend.card>
                <x-slot name="header">
                    @lang('Update User')
                </x-slot>

                <x-slot name="headerActions">
                    <x-utils.link class="" :href="route('admin.auth.user.index')" :text="__('Cancel')">
                        <x-slot name="icon">
                            <x-icons.x />
                        </x-slot>
                    </x-utils.link>
                </x-slot>

                <x-slot name="body">
                    <div x-data="{userType : '{{ $user->type }}'}">
                        @if (!$user->isMaster())
                            <div class="py-2">
                                <label for="type" class="@error('type') text-red-600 dark:text-red-600 @else text-gray-900 dark:text-gray-100 @enderror">@lang('Type*')</label>
                                <select name="type" id="type" x-on:change="userType = $event.target.value" class="rounded w-full appearance-none text-md py-1 px-2 focus:outline-none border-2 border-transparent focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-900 text-purple-900 dark:text-gray-100 placeholder-purple-300 dark:placeholder-gray-600 font-semibold" required autofocus>
                                    <option value="{{ $model::TYPE_USER }}" {{ $user->type === $model::TYPE_USER ? 'selected' : '' }}>@lang('User')</option>
                                    <option value="{{ $model::TYPE_ADMIN }}" {{ $user->type === $model::TYPE_ADMIN ? 'selected' : '' }}>@lang('Administrator')</option>
                                </select>
                            </div>
                        @endif

                        <div class="py-2">
                            <x-forms.inputs.text id="first-name" label="{{ __('First Name') }}" name="first_name" placeholder="{{ __('First Name') }}" value="{{ old('first_name', $user->first_name) }}" class="w-full rounded-lg"  required maxlength="100" />
                        </div>

                        <div class="py-2">
                            <x-forms.inputs.text id="last-name" label="{{ __('Last Name') }}" name="last_name" placeholder="{{ __('Last Name') }}" value="{{ old('last_name', $user->last_name) }}" class="w-full rounded-lg" maxlength="100" />
                        </div>

                        <div class="py-2">
                            <x-forms.inputs.email id="email" label="{{ __('Email Address') }}" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email', $user->email) }}" class="w-full rounded-lg" maxlength="255" required />
                        </div>

                        <div class="py-2">
                            <x-forms.inputs.tel id="mobile" label="{{ __('Mobile Number') }}" name="mobile" placeholder="{{ __('Mobile Number') }}" value="{{ old('mobile', $user->mobile) }}" class="w-full rounded-lg" minlength="10" maxlength="10" />
                        </div>

                        @if (!$user->isMaster())
                            @include('backend.auth.includes.roles')

                            @if (!config('quickstart.access.user.only_roles'))
                                @include('backend.auth.includes.permissions')
                            @endif
                        @endif
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-forms.inputs.submit color="green">Update User</x-forms.inputs.submit>
                </x-slot>
            </x-backend.card>
        </x-forms.patch>
    </div>
@endsection
