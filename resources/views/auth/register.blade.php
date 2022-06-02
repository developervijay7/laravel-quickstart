@extends('auth.layouts.app')

@section('title', 'Create your account at ' . appName())

@section('content')
    <section>
        <div class="container flex justify-end place-items-center min-h-screen dark:text-white">
            <div class="box shadow-xl bg-zinc-300 dark:bg-slate-700 rounded-xl p-5 w-[45rem]">
                <div class="flex items-center justify-between">
                    @include('includes.partials.logo')
                    <div class="relative flex items-center rounded-md bg-gray-300 dark:bg-gray-900 py-1 px-3">
                        @include('includes.partials.lang')
                    </div>
                    @include('includes.partials.switch')
                </div>
                <h1 class="font-bold text-2xl my-3">{{ __('headings.register', ['application' => __('labels.app-name')]) }}</h1>
                @include('includes.partials.messages')
                <x-forms.post action="{{ route('register') }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                        <div class="my-2">
                            <x-forms.inputs.text id="first-name" label="{{ __('labels.first_name') }}" name="first_name" placeholder="{{ __('labels.first_name') }}" value="{{ old('first_name') }}" class="w-full rounded-lg" autocomplete="first-name" required autofocus />
                        </div>
                        <div class="my-2">
                            <x-forms.inputs.text id="last-name" label="{{ __('labels.last_name') }}" name="last_name" placeholder="{{ __('labels.last_name') }}" value="{{ old('last_name') }}" class="w-full rounded-lg" autocomplete="last-name" />
                        </div>
                        <div class="my-2">
                            <x-forms.inputs.email id="email" label="{{ __('labels.email') }}" name="email" placeholder="{{ __('labels.email') }}" value="{{ old('email') }}" class="w-full rounded-lg" required />
                        </div>
                        <div class="my-2">
                            <x-forms.inputs.tel id="mobile" label="{{ __('labels.mobile') }}" name="mobile" placeholder="{{ __('labels.mobile') }}" value="{{ old('mobile') }}" class="w-full rounded-lg" maxlength="10" minlength="10" inputmode="numeric" autocomplete="mobile" />
                        </div>
                        <div class="my-2">
                            <x-forms.inputs.password id="password" label="{{ __('labels.password') }}" name="password" placeholder="{{ __('labels.password') }}" class="w-full rounded-lg" autocomplete="new-password" />
                        </div>
                        <div class="my-2">
                            <x-forms.inputs.password id="password-confirmation" label="{{ __('labels.password_confirmation') }}" name="password_confirmation" placeholder="{{ __('labels.password_confirmation') }}" class="w-full rounded-lg" autocomplete="new-password" />
                        </div>
                    </div>
                    <div class="my-4">
                        <div class="my-1">
                            <label for="terms" class="block text-gray-500 font-bold my-4 flex items-center gap-x-1">
                                <input type="checkbox" class="leading-loose text-pink-600 top-0" id="terms" name="terms"
                                       required> I agree to {{ appName() }} <a href="#">Terms
                                    of Service</a> and <a href="#">Privacy Policy</a>
                            </label>
                        </div>
                        <div class="my-1">
                            <label for="" class="block text-gray-500 font-bold my-4 flex items-center">
                                <input type="checkbox" class="leading-loose text-pink-600 top-0" name="subscribe"
                                       checked> Subscribe to <a href="#"
                                                                target="_blank">{{ appName() }}
                                    Newsletter</a>
                            </label>
                        </div>
                    </div>
                    <div class="my-4">
                        <button type="submit" class="mt-3 text-lg font-semibold
            bg-gray-800 w-1/2 text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black">Register
                        </button>
                    </div>
                </x-forms.post>
                <div>
                    <p>Already have an account? <a href="{{ route('login') }}" class="font-bold">Login Now</a></p>
                </div>
                <div class="divider my-4">
                    <span class="px-2 py-1 rounded-xl bg-gray-800 dark:bg-gray-200 text-gray-200 dark:text-gray-800">or use social login</span>
                </div>
                <div class="flex items-center justify-between text-white">
                    @include('auth.layouts.includes.social')
                </div>
            </div>
        </div>
    </section>
@endsection
