@extends('frontend.layouts.app')

@section('content')
    <section class="my-24">
        <div class="container">
            <div class="px-6">
                <h1 class="text-2xl md:text-3xl lg:text-4xl text-center my-6">{{ __('The only laravel boilerplate that you will ever need to start your next laravel project.') }}</h1>
                <p class="text-lg md:text-xl lg:text-2xl text-center my-6">Laravel Quick-Start is a laravel application boilerplate that bundles necessary packages, dependencies, scaffolding, authentication to quick start your project out of the box.</p>
                <p></p>
                <div class="my-12 grid grid-cols-2 md:grid-cols-5 gap-6">
                    <button class="bg-red-400 px-5 py-2 rounded shadow opacity-80 hover:opacity-100">View on Github</button>
                    <button class="bg-red-400 px-5 py-2 rounded shadow opacity-80 hover:opacity-100">Download Now</button>
                    <button class="bg-red-400 px-5 py-2 rounded shadow opacity-80 hover:opacity-100">Sponsor</button>
                    <button class="bg-red-400 px-5 py-2 rounded shadow opacity-80 hover:opacity-100">Contribute</button>
                    <button class="bg-red-400 px-5 py-2 rounded shadow opacity-80 hover:opacity-100">Donate</button>
                </div>
            </div>
        </div>
    </section>
@endsection
