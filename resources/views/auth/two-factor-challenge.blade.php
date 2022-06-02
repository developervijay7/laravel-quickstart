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
                <h1 class="font-bold text-2xl my-3">{{ __('headings.2fa') }}</h1>
                <p>{{ __('Please input your authentication code or recovery code to login.') }}</p>
                @include('includes.partials.messages')
                <x-forms.post action="route('two-factor.login')">
                    <div class="my-3">
                        <x-forms.inputs.text id="authentication-code" name="code" inputmode="numeric" class="w-full rounded-xl" autocomplete="one-time-code" placeholder="{{ __('Authentication Code') }}" autofocus />
                    </div>
                    <div class="py-3">
                        <div class="divider">
                            <span class="px-2 py-1 rounded-xl bg-gray-800 dark:bg-gray-200 text-gray-200 dark:text-gray-800">or use recovery code</span>
                        </div>
                    </div>
                    <div class="my-3">
                        <x-forms.inputs.text id="recovery_code" name="recovery_code" class="w-full rounded-xl" autocomplete="one-time-code" placeholder="{{ __('Recovery Code') }}" />
                    </div>
                    <div class="">
                        <button type="submit" class="mt-3 text-lg font-semibold
            bg-gray-800 w-1/2 text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black">Authorize Access
                        </button>
                    </div>
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
