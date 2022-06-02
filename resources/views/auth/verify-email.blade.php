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
                <h1 class="font-bold text-2xl my-3">{{ __('headings.email-verification') }}</h1>
                <p>{{ __('You can not have access to certain features until you verify this.') }}</p>
                @include('includes.partials.messages')
                <x-forms.post :action="route('verification.send')">
                    <div class="my-6">
                        <button type="submit" class="mt-3 text-lg font-semibold
            bg-gray-800 w-full text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black">Resend Verification Email
                        </button>
                    </div>
                </x-forms.post>
                <x-forms.post :action="route('logout')">
                    <div class="mt-6">
                        <button type="submit" class="mt-3 text-lg font-semibold
            bg-gray-800 w-full text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black">Logout
                        </button>
                    </div>
                </x-forms.post>
            </div>
        </div>
    </section>
@endsection
