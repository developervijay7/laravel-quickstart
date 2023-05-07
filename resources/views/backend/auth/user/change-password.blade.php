@extends('backend.layouts.app')

@section('title', __('Change Password for :name', ['name' => $user->name]))

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2">
        <x-forms.patch :action="route('admin.auth.user.change-password.update', $user)">
            <x-backend.card>
                <x-slot name="header">
                    @lang('Change Password for :name', ['name' => $user->full_name])
                </x-slot>

                <x-slot name="headerActions">
                    <x-utils.link :href="route('admin.auth.user.index')" :text="__('Cancel')" title="Cancel Password Change">
                        <x-slot name="icon">
                            <x-icons.backspace />
                        </x-slot>
                    </x-utils.link>
                </x-slot>

                <x-slot name="body">
                    <div class="py-2">
                        <x-bladewind.input type="password" name="password"  autocomplete="new-password" placeholder="{{ __('Password') }}" required />
                    </div>

                    <div class="py-2">
                        <x-bladewind.input type="password" name="password_confirmation" autocomplete="new-password" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required />
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-bladewind.button
                        can_submit="true"
                        color="green">
                        {{ __('Update Password') }}
                    </x-bladewind.button>
                </x-slot>
            </x-backend.card>
        </x-forms.patch>
    </div>
@endsection
