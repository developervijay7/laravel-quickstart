@extends('auth.layouts.app')

@section('title', 'Login at ' . appName())

@section('content')
    <section>
        <div class="container flex justify-end place-items-center min-h-screen dark:text-white">
            <div class="box shadow-xl bg-zinc-300 dark:bg-slate-700 rounded-xl p-5 w-[30rem]">
                <div class="flex items-center justify-between">
                    @include('includes.partials.logo')
                    <div class="relative flex items-center rounded-md bg-gray-300 dark:bg-gray-900 py-1 px-3">
                        @include('includes.partials.lang')
                    </div>
                    @include('includes.partials.switch')
                </div>
                <h1 class="font-bold text-2xl my-3">{{ __('headings.login', ['application' => __('labels.app-name')]) }}</h1>
                @include('includes.partials.messages')
                <x-forms.post action="{{ route('login') }}">
                    <div class="my-3">
                       <x-forms.inputs.email id="email" label="{{ __('labels.email') }}" name="email" placeholder="{{ __('labels.email') }}" value="{{ old('email') }}" class="w-full rounded-lg" autofocus required/>
                    </div>
                    <div class="my-3">
                        <x-forms.inputs.password id="password" label="{{ __('labels.password') }}" name="password" placeholder="{{ __('labels.password') }}" class="w-full rounded-lg" autocomplete="current-password" required />
                    </div>
                    <div class="my-3">
                        <label for="remember" class="block text-gray-500 font-bold my-4 flex items-center dark:text-white">
                            <input type="checkbox" class="leading-loose text-pink-600 top-0" id="remember"
                                   name="remember">
                            {{ __('labels.remember') }}
                        </label>
                    </div>
                    <div class="my-3 flex justify-between items-center">
                        <button type="submit" class="mt-3 text-lg font-semibold
            bg-gray-800 w-1/2 text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black">Login
                        </button>
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    </div>
                    <div>
                        <p>Don't have an account yet? <a href="{{ route('register') }}" class="font-bold">Register Now</a></p>
                    </div>
                </x-forms.post>
                <div class="divider my-6">
                    <span class="px-2 py-1 rounded-xl bg-gray-800 dark:bg-gray-200 text-gray-200 dark:text-gray-800">or use social login</span>
                </div>
                <div class="flex items-center justify-between text-white">
                    @include('auth.layouts.includes.social')
                </div>
            </div>
        </div>
    </section>
@endsection
