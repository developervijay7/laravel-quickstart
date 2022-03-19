@extends('auth.layouts.app')

@section('content')
    <section>
        <div class="container flex justify-center items-center min-h-screen">
            <div class="box shadow-xl bg-gray-200 dark:bg-gray-600 rounded-xl p-5 w-[30rem]">
                <div class="flex items-center justify-between">
                    @include('includes.partials.logo')
                    @include('includes.partials.lang')
                    @include('includes.partials.switch')
                </div>
                <h1 class="font-bold text-2xl my-3">{{ __('headings.password-reset') }}</h1>
                <p>{{ __('Reset your forgotten password') }}</p>
                <form action="{{ route('password.email') }}" action="post">
                    @csrf
                    <div class="">
                        <label for="email">{{ __('labels.email') }}</label>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
