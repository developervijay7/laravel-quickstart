<?php

/*
 * All configuration options for Laravel Quick-Start
 * https://github.com/jlmasi/laravel-quickstart.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Access
    |--------------------------------------------------------------------------
    |
    | Configurations related to the quick-start's access/authorization options
    */
    'access' => [
        'captcha' => [
            'configs' => [
                'site_key' => env('RECAPTCHA_SITEKEY'),
                'secret_key' => env('RECAPTCHA_SECRETKEY'),
                'options' => [
                    'hidden' => false,
                    'location' => 'bottomright',
                    'timeout' => 5,
                ],
            ],
            'login' => env('LOGIN_CAPTCHA_STATUS', false),
            'registration' => env('REGISTRATION_CAPTCHA_STATUS', false),
            'contact' => env('CONTACT_CAPTCHA_STATUS', false),
            'newsletter' => env('NEWSLETTER_CAPTCHA_STATUS', false),
        ],

        'user' => [

            /*
             * Whether a user can change their email address after
             * their account has already been created
             */
            'change_email' => env('CHANGE_EMAIL', false),

            /*
             * When creating users from the backend, only allow the assigning of roles and not individual permissions
             */
            'only_roles' => false,

            /*
             * How many days before users have to change their passwords
             * false is off
             */
            'password_expires_days' => env('PASSWORD_EXPIRES_DAYS', 365),

            /*
             * The number of most recent previous passwords to check against when changing/resetting a password
             * false is off which doesn't log password changes or check against them
             *
             * Note: Enabling single_login will have an effect on this as it force changes the users password on login,
             * which will force a record into the password_histories table. I currently do not have a fix in mind.
             */
            'password_history' => env('PASSWORD_HISTORY', 3),

            /*
             * Whether a user can be permanently deleted from the system via the backend
             * The regular delete button will still exist, and will soft delete the user
             * but the permanently deleted button on the 'deleted users' screen will be hidden.
             */
            'permanently_delete' => false,

            /*
             * Whether the register route and view are active
             */
            'registration' => env('ENABLE_REGISTRATION', false),

            /*
             * When active, a user can only have one session active at a time
             * That is all other sessions for that user will be deleted when they log in
             * (They can only be logged into one place at a time, all others will be logged out)
             * AuthenticateSession middleware must be enabled
             */
            'single_login' => env('SINGLE_LOGIN', false),

            /*
            * Whether the administrator login required 2 factor authentication
            */
            'admin_requires_2fa' => env('ADMIN_REQUIRES_2FA', false),
        ],

        'role' => [

            /*
             * The name of the administrator role
             * Should be Administrator by design and unable to change from the backend
             * It is not recommended to change
             */
            'admin' => 'Administrator',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Avatar
    |--------------------------------------------------------------------------
    |
    | Configurations related to the quickstart's avatar system
    */
    'avatar' => [

        /*
         * Default size of the avatar if none is supplied
         */
        'size' => 80,
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend Breadcrumbs
    |--------------------------------------------------------------------------
    |
    | Whether or not to show the breadcrumb trail on the frontend
    | Note: Turning this off does not unregister the breadcrumbs in the routes file, it just hides the navbar
    */
    'frontend_breadcrumbs' => true,

    /*
    |--------------------------------------------------------------------------
    | Google Analytics
    |--------------------------------------------------------------------------
    |
    | Found in views/includes/partials/ga.blade.php
    */
    'google_tag_manager' => env('GOOGLE_TAG_MANAGER', null),

    /*
    |--------------------------------------------------------------------------
    | Google Analytics
    |--------------------------------------------------------------------------
    |
    | Found in views/includes/partials/ga.blade.php
    */
    'force_https' => env('FORCE_HTTPS', false),

    /*
    |--------------------------------------------------------------------------
    | Locale
    |--------------------------------------------------------------------------
    |
    | Configurations related to the quickstart's locale system
    */
    'locale' => [
        /*
         * Whether to show the language picker, or just default to the default
         * locale specified in the app config file
         */
        'status' => true,

        /*
         * Available languages
         *
         * Add your language code to this array.
         * The code must have the same name as the language folder.
         * Be sure to add the new language in alphabetical order.
         *
         * The language picker will not be available if there is only one language option
         * Commenting out languages will make them unavailable to the user
         */
        'languages' => [
            'en' => ['name' => 'English', 'rtl' => false, 'flag' => 'us'],
            'hi' => ['name' => 'Hindi', 'rtl' => false, 'flag' => 'in'],
            'ur' => ['name' => 'Urdu', 'rtl' => true, 'flag' => 'pk'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Testing Mode
    |--------------------------------------------------------------------------
    |
    | When your application is currently running tests
    |
    */
    'testing' => env('APP_TESTING', false),

    /*
    |--------------------------------------------------------------------------
    | Notification Webhook URL
    |--------------------------------------------------------------------------
    |
    | Send notifications via this slack webhook
    |
    */
    'notification_webhook' => env('NOTIFICATION_SLACK_WEBHOOK_URL'),
];
