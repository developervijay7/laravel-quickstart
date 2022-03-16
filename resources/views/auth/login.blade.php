@extends('frontend.layouts.app')

@section('title', 'Login at ' . appName())

@section('content')
    <section>
        <div class="container flex justify-end place-items-center my-12">
            <div class="box shadow-xl bg-gray-200 dark:bg-gray-600 rounded-xl p-5 w-[30rem]">
                <h1 class="font-bold text-2xl my-3">Login to {{ appName() }} Account</h1>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="my-3">
                        <label for="" class="px-1 text-sm text-gray-600">Email Address</label>
                        <input type="email" name="email" class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                               value="admin@admin.com">
                    </div>
                    <div class="my-3">
                        <label for="" class="px-1 text-sm text-gray-600">Password</label>
                        <input type="password" name="password" class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none"
                               value="cOdE5581">
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
                        <a href="#">Forgot password?</a>
                    </div>
                </form>
                <hr/>
                <div class="grid grid-cols-2 gap-3 mt-6">
                    <a href="#" class="facebook rounded py-2">
                        <x-icons.facebook/>
                    </a>
                    <a href="#" class="twitter rounded py-2">
                        <x-icons.twitter/>
                    </a>
                    <a href="#" class="google rounded py-2">
                        {{--                        <x-icons.google />--}}
                    </a>
                    <a href="#" class="linkedin rounded py-2">
                        <x-icons.linkedin/>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
