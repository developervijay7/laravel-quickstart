@extends('frontend.layouts.app')

@section('content')
    <section class="my-24">
        <div class="container">
            <h1 class="text-4xl text-center">{{ __('The only laravel boilerplate that you will ever need to start your next laravel project.') }}</h1>
            <p class="text-2xl text-center">Laravel Quick-Start is a laravel application boilerplate that bundles necessary packages, dependencies, scaffolding, authentication to quick start your project out of the box.</p>
            <div class="my-12 flex items-center justify-center gap-12">
                <button class="bg-red-400 px-5 py-2 rounded shadow opacity-80 hover:opacity-100">View on Github</button>
                <button class="bg-red-400 px-5 py-2 rounded shadow opacity-80 hover:opacity-100">Download Now</button>
                <button class="bg-red-400 px-5 py-2 rounded shadow opacity-80 hover:opacity-100">Sponsor</button>
                <button class="bg-red-400 px-5 py-2 rounded shadow opacity-80 hover:opacity-100">Contribute</button>
                <button class="bg-red-400 px-5 py-2 rounded shadow opacity-80 hover:opacity-100">Donate</button>
            </div>
        </div>
    </section>
@endsection
