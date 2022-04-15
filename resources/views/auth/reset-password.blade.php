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
                <p>{{ __('Please don\'t forget your password next time.') }}</p>
                @include('includes.partials.messages')
                <x-forms.post :action="route('password.update')">
                    <div class="my-3">
                        <x-forms.inputs.email label="{{ __('labels.email') }}" id="email" name="email" class="w-full rounded-xl" placeholder="{{ __('labels.email') }}" value="{{ old('email', $request->email) }}" required readonly />
                    </div>
                    <div class="my-3">
                        <x-forms.inputs.password label="{{ __('labels.password') }}" name="password" id="password" class="rounded-xl w-full" autocomplete="new-password" placeholder="{{ __('labels.new_password') }}" value="{{ old('password') }}" required autofocus />
                    </div>
                    <div class="my-3">
                        <x-forms.inputs.password label="{{ __('labels.password_confirmation') }}" name="password_confirmation" id="password-confirmation" class="rounded w-full border-gray-300 text-gray-900" autocomplete="new-password" placeholder="{{ __('labels.password_confirmation') }}" value="{{ old('password_confirmation') }}" required />
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
