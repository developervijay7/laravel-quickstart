@extends('auth.layouts.app')

@section('title', 'Login at ' . appName())

@section('content')
    <section>
        <div class="container flex justify-end place-items-center min-h-screen dark:text-white">
            <div class="box shadow-xl bg-gray-200 dark:bg-gray-600 rounded-xl p-5 w-[30rem]">
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
                       <x-forms.inputs.text id="email" label="{{ __('labels.email') }}" name="email" placeholder="{{ __('labels.email') }}" class="w-full rounded-lg" />
                    </div>
                    <div class="my-3">
                        <x-forms.inputs.password id="password" label="{{ __('labels.password') }}" name="password" placeholder="{{ __('labels.password') }}" class="w-full rounded-lg" />
                    </div>
                    <div class="my-3">
                        <label for="remember" class="block text-gray-500 font-bold my-4 flex items-center">
                            <input type="checkbox" class="leading-loose text-pink-600 top-0" id="remember"
                                   name="remember">
                            Remember me
                        </label>
                    </div>
                    <div class="my-3 flex justify-between items-center">
                        <button type="submit" class="mt-3 text-lg font-semibold
            bg-gray-800 w-1/2 text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black">Login
                        </button>
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    </div>
                </x-forms.post>
                <hr/>
                <div class="grid grid-cols-2 gap-3 mt-6">
                    <a href="#" class="facebook rounded py-2">
                        <x-icons.facebook/>
                    </a>
                    <a href="#" class="twitter rounded py-2">
                        <x-icons.twitter/>
                    </a>
                    <a href="#" class="google rounded py-2">
                        <x-icons.google />
                    </a>
                    <a href="#" class="linkedin rounded py-2">
                        <x-icons.linkedin/>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
