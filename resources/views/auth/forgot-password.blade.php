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
                <h1 class="font-bold text-2xl my-3">{{ __('headings.password-reset') }}</h1>
                <p>{{ __('Reset your forgotten password') }}</p>
                @include('includes.partials.messages')
                <x-forms.post :action="route('password.email')">
                    <div class="my-2">
                        <x-forms.inputs.email id="email" label="{{ __('labels.email') }}" name="email" placeholder="{{ __('labels.email') }}" value="{{ old('email') }}" class="w-full rounded-lg" required autofocus />
                    </div>
                    <button type="submit" class="mt-3 text-lg font-semibold
            bg-gray-800 w-1/2 text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black">Send Link
                    </button>
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
