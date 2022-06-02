@extends('auth.layouts.app')

@section('content')
    <section>
        <div class="container flex justify-center items-center min-h-screen">
            <div class="box shadow-xl bg-zinc-300 dark:bg-slate-700 rounded-xl p-5 w-[30rem]">
                <div class="flex items-center justify-between">
                    @include('includes.partials.logo')
                    @include('includes.partials.lang')
                    @include('includes.partials.switch')
                </div>
                <h1 class="font-bold text-2xl my-3">{{ __('headings.change-password') }}</h1>
                <p>{{ __('You should update your password frequently to ensure security.') }}</p>
                @include('includes.partials.messages')
                <x-forms.post :action="route('user-password.update')">
                    <div class="my-3">
                        <x-forms.inputs.password label="{{ __('labels.current-password') }}" name="current_password" id="current-password" class="w-full rounded-lg" autocomplete="current-password" placeholder="{{ __('labels.current-password') }}" value="{{ old('current_password') }}" autofocus required />
                    </div>
                    <div class="my-3">
                        <x-forms.inputs.password label="{{ __('labels.new-password') }}" name="password" id="password" class="w-full rounded-lg" autocomplete="new-password" placeholder="{{ __('labels.new-password') }}" value="{{ old('password') }}" required />
                    </div>
                    <div class="my-3">
                        <x-forms.inputs.password label="{{ __('labels.password-confirmation') }}" name="password_confirmation" id="password-confirmation" class="w-full rounded-lg" autocomplete="new-password" placeholder="{{ __('labels.password-confirmation') }}" value="{{ old('password_confirmation') }}" required />
                    </div>
                    <button type="submit" class="mt-3 text-lg font-semibold
            bg-gray-800 w-1/2 text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black">Change Password
                    </button>
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
