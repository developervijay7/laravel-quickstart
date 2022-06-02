<div class="relative mt-16 bg-zinc-900 text-white">
    <svg class="absolute top-0 w-full h-6 -mt-5 sm:-mt-10 sm:h-16 text-zinc-900" preserveAspectRatio="none" viewBox="0 0 1440 54">
        <path fill="currentColor" d="M0 22L120 16.7C240 11 480 1.00001 720 0.700012C960 1.00001 1200 11 1320 16.7L1440 22V54H1320C1200 54 960 54 720 54C480 54 240 54 120 54H0V22Z"></path>
    </svg>
    <div class="px-4 pt-12 container md:px-24 lg:px-8">
        <div class="grid gap-16 row-gap-10 mb-8 lg:grid-cols-6">
            <div class="md:max-w-md lg:col-span-2">
                <a href="{{ route('frontend.index') }}" aria-label="Go home" title="{{ $college->name }}" class="inline-flex items-center">
                    <img src="{{ asset($college->logo) }}" alt="{{ $college->name }} Logo" class="h-32">
                    <span class="ml-2 text-xl font-bold tracking-wide text-gray-100 uppercase">{{ $college->name }}</span>
                </a>
                <div class="mt-4 lg:max-w-sm">
                    <p class="text-sm text-deep-purple-50">
                        Affiliated to <a href="#">Dr. Bhim Rao Ambedkar University, Agra</a>
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 row-gap-8 lg:col-span-4 md:grid-cols-4">
                <div>
                    <p class="font-semibold tracking-wide text-teal-accent-400">
                        Important Links
                    </p>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Dr. Bhim Rao Ambedkar University, Agra</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Regional Higher Education</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">University Grants Commission</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">All India Survey on Higher Education</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-semibold tracking-wide text-teal-accent-400">Student Corner</p>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">College Feedback</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Downloads Section</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Anti Ragging Cell</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Complaints & Suggestions</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Placements</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-semibold tracking-wide text-teal-accent-400">More Information</p>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Terms of Service</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">College Prospectus</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">News Archive</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Events Archive</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-semibold tracking-wide text-teal-accent-400">
                        Administration
                    </p>
                    <ul class="mt-2 space-y-2">
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Admin Dashboard</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Careers</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">College Blog</a>
                        </li>
                        <li>
                            <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">College Management</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-between pt-5 pb-10 border-t border-deep-purple-accent-200 sm:flex-row">
            <p class="text-sm text-gray-100">
                © Copyright @php echo date('Y') @endphp Attrix Technologies. Designed by <a href="https://vijaygoswami.in">Vijay Goswami</a>.
            </p>
            <div class="flex items-center mt-4 space-x-4 sm:mt-0">
                @isset($college->facebook)
                    <a href="/" class="transition-colors duration-300 text-deep-purple-100 hover:text-teal-accent-400">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                            <path
                                d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"
                            ></path>
                        </svg>
                    </a>
                @endisset
                @isset($college->twitter)
                        <a href="/" class="transition-colors duration-300 text-deep-purple-100 hover:text-teal-accent-400">
                            <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                                <circle cx="15" cy="15" r="4"></circle>
                                <path
                                    d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"
                                ></path>
                            </svg>
                        </a>
                @endisset
                @isset($college->linkedin)
                        <a href="/" class="transition-colors duration-300 text-deep-purple-100 hover:text-teal-accent-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                                <path
                                    d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
                                ></path>
                            </svg>
                        </a>
                @endisset
                    @isset($college->linkedin)
                        <a href="/" class="transition-colors duration-300 text-deep-purple-100 hover:text-teal-accent-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                                <path
                                    d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
                                ></path>
                            </svg>
                        </a>
                    @endisset
                    @isset($college->linkedin)
                        <a href="/" class="transition-colors duration-300 text-deep-purple-100 hover:text-teal-accent-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                                <path
                                    d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
                                ></path>
                            </svg>
                        </a>
                    @endisset
            </div>
        </div>
    </div>
</div>
