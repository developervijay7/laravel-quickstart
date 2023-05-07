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
                            <label for="first_name" class="@error('first_name') text-red-600 dark:text-red-600 @else text-gray-900 dark:text-gray-100 @enderror">@lang('First Name*')</label>
                            <x-bladewind.input type="text" placeholder="{{ __('First Name') }}" name="first_name" value="{{ old('first_name', $user->first_name) }}" required maxlength="100" />
                        </div>

                        <div class="py-2">
                            <label for="last_name" class="@error('last_name') text-red-600 dark:text-red-600 @else text-gray-900 dark:text-gray-100 @enderror">@lang('Last Name')</label>
                            <x-bladewind.input type="text" placeholder="{{ __('Last Name') }}" name="last_name" value="{{ old('last_name', $user->last_name) }}" maxlength="100" />
                        </div>

                        <div class="py-2">
                            <label for="email" class="@error('email') text-red-600 dark:text-red-600 @else text-gray-900 dark:text-gray-100 @enderror">@lang('E-mail Address*')</label>
                            <x-bladewind.input type="email" placeholder="{{ __('E-mail Address') }}" name="email" value="{{ old('email', $user->email) }}" maxlength="255" required />
                        </div>

                        <div class="py-2">
                            <label for="mobile" class="@error('mobile') text-red-600 dark:text-red-600 @else text-gray-900 dark:text-gray-100 @enderror">@lang('Mobile Number')</label>
                            <x-bladewind.input type="tel" placeholder="{{ __('Mobile Number') }}" name="mobile" value="{{ old('mobile', $user->mobile) }}" minlength="10" maxlength="10" />
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
                    <x-bladewind.button
                        can_submit="true"
                        color="green">
                        {{ __('Update User') }}
                    </x-bladewind.button>
                </x-slot>
            </x-backend.card>
        </x-forms.patch>
    </div>
@endsection
