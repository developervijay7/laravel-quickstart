<div class="bg-zinc-900">
    <div class="flex justify-between h-10">
        <div class="container hwrap">
            <x-frontend.breaking-news />
        </div>
        <div class="flex items-center">
            <ul class="flex">
                    @isset($college->facebook)
                        <li><a href="#">f</a></li>
                    @endisset
                    @isset($college->twitter)
                        <li><a href="#">f</a></li>
                    @endisset
                    @isset($college->linkedin)
                        <li><a href="#">f</a></li>
                    @endisset
                    @isset($college->instagram)
                        <li><a href="#">f</a></li>
                    @endisset
                    @isset($college->youtube)
                        <li><a href="#">f</a></li>
                    @endisset
            </ul>
            <a href="#">Admission 2022-23</a>
        </div>
    </div>
    <header class="bg-indigo-400 text-white">
        <div class="container flex items-center justify-between">
            <div id="site-logo" class="flex items-center">
                <img src="{{ asset($college->logo) }}" alt="{{ $college->name }} Logo" class="h-28">
                <div>
                    <h1 class="text-lg md:text-2xl">{{ $college->name }}</h1>
                    <h1 class="text-lg md:text-2xl">बाबू शिवनाथ अग्रवाल (PG) कॉलेज, मथुरा</h1>
                    <h2 class="text-xs mt-2">Affiliated to {{ $college->primary_university }} | College Code: {{ $college->code }}</h2>
                </div>
            </div>
            <div class="hidden md:block">
                <form>
                    <div class="">
                        <label for="search"></label>
                        <input type="search" class="rounded px-5 py-1 text-black">
                        <button type="submit" class="rounded bg-green-500 px-5 py-1 text-white">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <div class="bg-zinc-900 bg-opacity-75 hidden lg:block text-white">
        <div class="container flex items-center justify-between font-bold">
            <nav class="py-2">
                <ul class="flex gap-5 items-center">
                    <li class="">
                        <a href="http://psscive.in" class="p-2">Home</a>
                    </li>
                    <li class="">
                        <div class="relative" x-data="{ show: false }" @click.away="show = false">
                            <a href="#" @click.prevent="show = !show" class="flex items-center">
                                <div class="flex items-center">
                                    <div class="">
                                        About
                                    </div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4 transform transition duration-150 ease-in-out" :class="show ? '-rotate-180' : ''" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div x-show="show" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10" style="display: none;">
                                <ul>
                                    <li class="">

                                        <a href="http://psscive.in/about" class="block px-4 py-2 transition duration-100 text-sm text-gray-800 border-b hover:bg-gray-200 ">About
                                            Us</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 transition duration-100 text-sm text-gray-800 border-b hover:bg-gray-200 ">Organogram</a>
                                    </li>
                                    <li>
                                        <a href="http://psscive.in/about/infrastructure" class="block px-4 py-2 transition duration-100 text-sm text-gray-800 border-b hover:bg-gray-200 ">Infrastructure</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <nav class="py-2 font-bold">
                <ul class="flex gap-5">
                    <li>
                        <a href="http://psscive.in/register">Register</a>
                    </li>
                    <li>
                        <a href="http://psscive.in/login">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
