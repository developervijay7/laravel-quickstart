<footer>
    <div class="container">
        <div class="bg-gray-200 dark:bg-gray-600 rounded-xl px-5 py-4 flex items-center justify-between shadow-xl">
            <div>{{ __('labels.copyright') }} &copy; <?php echo(date('Y')) ?>
                <a href="https://www.attrixtech.com" target="_blank"
                   class="text-accent link font-bold" rel="nofollow noopener">{{ __('labels.attrix') }}</a>.
                Developed by <a href="https://vijaygoswami.in" class="text-accent link font-bold" target="_blank" rel="nofollow noopener">{{ __('labels.vijay') }}</a> & <a
                    class="text-accent link font-bold" href="https://www.facebook.com/jlmasi27" target="_blank" rel="nofollow noopener">{{ __('labels.james') }}</a>
            </div>
            <div class="prevent-external">
                <ul class="flex items-center gap-x-2 text-white">
                    <li>
                        <a href="#" class="facebook rounded-full p-2 inline-flex" target="_blank" rel="nofollow noopener">
                            <x-icons.facebook/>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="twitter rounded-full p-2 inline-flex" target="_blank" rel="nofollow noopener">
                            <x-icons.twitter/>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="linkedin rounded-full p-2 inline-flex" target="_blank" rel="nofollow noopener">
                            <x-icons.linkedin/>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="youtube rounded-full p-2 inline-flex" target="_blank" rel="nofollow noopener">
                            <x-icons.youtube/>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="instagram rounded-full p-2 inline-flex" target="_blank" rel="nofollow noopener">
                            <x-icons.instagram/>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
