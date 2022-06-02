@extends('frontend.layouts.app')


@section('content')
    <section>
        <div class="container py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                <div class="col-span-1 border rounded-3xl py-12 text-center">
                    @include('frontend.user.layouts.includes.sidebar')
                </div>
                <div class="col-span-1 md:col-span-3 border rounded-3xl py-12 px-20 bg-gray-200">
                    @yield('user-content')
                </div>
            </div>
        </div>
    </section>
@endsection
