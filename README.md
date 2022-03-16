
[<img src="https://github.com/developervijay7/laravel-quickstart/blob/main/resources/images/logo-dark.svg" width="400">](https://laravel-quickstart.co)

# About Laravel Quick-Start

Laravel Quickstart is a boilerplate for Laravel Application with typical packages preinstalled and configured to extend a full-fledged application. We tried to make it as minimal as possible.

Here are some of its features:
- Separate Views, Routes, Controllers directories for Frontend(Public Interface) and Backend(Admin Interface)
- Both Frontend and Backend utilizes [TailwindCSSv3](https://tailwindcss.com/) as frontend framework
- User Management [Laravel Fortify](https://github.com/laravel/fortify) package, with social login [Socialite](https://github.com/laravel/socialite) and Roles and Permissions [Spatie Laravel Permissions](https://github.com/spatie/laravel-permission) package
- Integrated [Log Viewer](https://github.com/ARCANEDEV/LogViewer)


We are trying to make the package easier to deploy.

## How to Install

### 1. Download Laravel-QuickStart 
Choose your preferred method
- Download [Zipped Archive](https://github.com/developervijay7/laravel-quickstart/archive/refs/heads/main.zip).
- Clone from GitHub <code>git clone https://github.com/developervijay7/laravel-quickstart.git</code>

### 2. Setup .env file
Laravel-QuickStart has a **.env.example** file in the root of the project.

Rename **.env.example** to **.env**  make sure that the **.env** file must be in root directory. 
Open **.env** file in your preferred choice of editor and add database credentials.

Database configuration

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=root
DB_PASSWORD=password
```

Also, don't forget to set up mail configuration.

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@laravel-quickstart.co"
MAIL_TO_ADDRESS="${APP_NAME}"
```

**Note:** Make sure your operating system is not configured to display hidden files to show **.env** file.

### 3. Composer
In order to install php [composer]() dependencies you first need to [set up composer on your operating system]().
Once your system is compatible with php composer run the following command in your Terminal/ Windows Command Prompt/ Windows powershell/ git bash.

<code>composer install</code>

### 4. Generate Application Keys
This will set your APP_KEY in your **.env** file

<code>php artisan key:generate</code>

### 5. Migrate Database

<code>php artisan migrate</code>

if you also want to import demo users, permissions, and roles run:

<code>php artisan db:seed</code>


### 6. NPM/Yarn
In order to install JavaScript dependencies in your application you will need to install [Node Package Manager]()
and optionally you can use [yarn]() to install them.

Once you have NPM installed run this command
<code>npm install</code>

or if you want to install using yarn run:
<code>yarn</code>


### 7. NPM run prod/dev
If you are deploying Laravel-QuickStart on your production environment run:

<code>npm run prod</code>

If you are deploying it on your local development computer run:

<code>npm run dev</code>

### 8. Demo Credentials

Master: master@example.com

Password: M@aster

Admin: admin@example.com

Password: Adm!n

User: user@example.com

Password: Us@r

##Official Documentation
[Laravel-QuickStart Documentation]()

## Contributing

Thank you for considering contributing to the Laravel Quick-Start
project! Please feel free to make any pull requests, or e-mail me a feature request you would like to see in the future to James L Masi at [jameslmasi27@gmail.com](mailto:jameslmasi27@gmail.com).

## License

The Laravel framework is open-sourced software licensed under the  [MIT license](https://opensource.org/licenses/MIT).

