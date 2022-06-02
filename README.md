![Laravel-QuickStart Logo](https://raw.githubusercontent.com/developervijay7/laravel-quickstart/2c97a0c0e46f48dd3f10989292bd4f824fdbce52/resources/images/logo.svg#gh-light-mode-only)
![Laravel-QuickStart Logo](https://raw.githubusercontent.com/developervijay7/laravel-quickstart/2c97a0c0e46f48dd3f10989292bd4f824fdbce52/resources/images/logo-dark.svg#gh-dark-mode-only)

![GitHub language count](https://img.shields.io/github/languages/count/developervijay7/laravel-quickstart?style=plastic)
![GitHub top language](https://img.shields.io/github/languages/top/developervijay7/laravel-quickstart?style=plastic)
![Discord](https://img.shields.io/discord/959485139354791936?style=plastic)
![GitHub all releases](https://img.shields.io/github/downloads/developervijay7/laravel-quickstart/total?style=plastic)
![GitHub Sponsors](https://img.shields.io/github/sponsors/developervijay7?style=plastic)
![GitHub issues](https://img.shields.io/github/issues/developervijay7/laravel-quickstart?style=plastic)
![GitHub pull requests](https://img.shields.io/github/issues-pr/developervijay7/laravel-quickstart)
![GitHub](https://img.shields.io/github/license/developervijay7/laravel-quickstart)
![Website](https://img.shields.io/website?down_color=red&down_message=down&style=plastic&up_color=green&up_message=up&url=https%3A%2F%2Flaravel-quickstart.co)
![GitHub commit activity](https://img.shields.io/github/commit-activity/w/developervijay7/laravel-quickstart)
![GitHub contributors](https://img.shields.io/github/contributors/developervijay7/laravel-quickstart)
![GitHub last commit](https://img.shields.io/github/last-commit/developervijay7/laravel-quickstart)
![GitHub Discussions](https://img.shields.io/github/discussions/developervijay7/laravel-quickstart)


![GitHub followers](https://img.shields.io/github/followers/developervijay7?style=social)
![GitHub forks](https://img.shields.io/github/forks/developervijay7/laravel-quickstart?style=social)
![GitHub Repo stars](https://img.shields.io/github/stars/developervijay7/laravel-quickstart?style=social)
![GitHub User's stars](https://img.shields.io/github/stars/developervijay7?affiliations=OWNER&style=social)

# Get Started

Laravel Quickstart is a boilerplate for Laravel Application with typical packages preinstalled and configured to extend a full-fledged application. We tried to make it as minimal as possible.

## Why is matters?
- Separate Views, Routes, Controllers directories for Frontend(Public Interface) and Backend(Admin Interface)
- Both Frontend and Backend utilizes [TailwindCSSv3](https://tailwindcss.com/) as frontend framework
- Ready-made pages for Authentication/User Management/ Roles/Permission Management/ Log-viewer/ Notifications Management
- User Management [Laravel Fortify](https://github.com/laravel/fortify) package, with social login [Socialite](https://github.com/laravel/socialite), API Authentication using [Laravel Sanctum](https://github.com/laravel/sanctum) and Roles and Permissions [Spatie Laravel Permissions](https://github.com/spatie/laravel-permission) package
- Integrated [Log Viewer](https://github.com/ARCANEDEV/LogViewer)
- Integrated [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) as dev-dependency
- Preconfigured [BrowserSync](https://browsersync.io/)
- User Impersonation using [Laravel Impersonate](https://github.com/404labfr/laravel-impersonate)
- [UUID Generator](https://github.com/ramsey/uuid)
- Breadcrumbs implementation using [Laravel Breadcrumbs](https://github.com/tabuna/breadcrumbs)
- [Icons Library](https://laravel-icons.com) using [Laravel-Icons](https://github.com/developervijay7/laravel-icons)
- Event Listeners Implementation for Various User Events as example to encourage devs to implement more as required
- Multiple helper functions
- Useful Model Traits
- [User Activity Log](https://github.com/spatie/laravel-activitylog)
- Multilingual Scaffolding
- User [Timezone](https://github.com/jamesmills/laravel-timezone)
- Implementation of User and Roles/Permission Factories and Seeders
- Least JavaScript (No jQuery) as we love working with AlpineJS
- Utilises SEO Tags (OpenGraph Facebook, Twitter Tags)
- Implementation and Scaffolding of SEO Tags using [Google Tags Manager](https://tagmanager.google.com)
- Progressive Web App (PWA) implementation out of the box
- Tailor-made plethora of laravel blade components to make your development life a breeze 


We tried to bootstrap any requirement your application may have, yet we are open to discuss adding more. 

## Installation

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
For the purpose of demonstration we have seeded 3 users by default that are Master, Admin and User having roles assigned for them respectively.
To add more refer to Spatie Permission Package Documentation [here](https://spatie.be/docs/laravel-permission/v5/introduction)

Master: master@example.com

Password: Master@123

Admin: admin@example.com

Password: Admin@123

User: user@example.com

Password: User@123


## Official Documentation
[Laravel-QuickStart Documentation](http://docs.laravel-quickstart.co)


## Project Built Using Laravel-QuickStart

- [Attrix Technologies Global](https://www.attrixtech.com)
- [Attrix Technologies India](https://www.attrixtech.in)
- [Vijay Goswami Developer Portfolio](https://vijaygoswami.in)
- [CollegeFind](https://collegefind.in)
- [Pandit Sundarlal Sharma Central Institute of Vocational Education, Bhopal](http://psscive.ac.in)
- [PSSCIVE, Bhopal - Staging Server](https://psscive.in)
- [Laravel-Icons](https://laravel-icons.com)
- [TechnoVIJ Blog](https://technovij.com)

## Contributing

Thank you for considering contributing to the Laravel Quick-Start
project! Please feel free to make any pull requests, or e-mail me a feature request you would like to see in the future to Vijay Goswami at [hexpit@gmail.com](mailto:hexpit@gmail.com).

## License

The Laravel-QuickStart is open-sourced software licensed under the  [MIT license](https://opensource.org/licenses/MIT).

## Star Gazers
[![Stargazers repo roster for @developervijay7/laravel-quickstart](https://reporoster.com/stars/developervijay7/laravel-quickstart)](https://github.com/developervijay7/laravel-quickstart/stargazers#gh-light-mode-only)
[![Stargazers repo roster for @developervijay7/laravel-quickstart](https://reporoster.com/stars/dark/developervijay7/laravel-quickstart)](https://github.com/developervijay7/laravel-quickstart/stargazers#gh-dark-mode-only)

## Forkers
[![Forkers repo roster for @developervijay7/laravel-quickstart](https://reporoster.com/forks/developervijay7/laravel-quickstart)](https://github.com/developervijay7/laravel-quickstart/network/members#gh-light-mode-only)
[![Forkers repo roster for @developervijay7/laravel-quickstart](https://reporoster.com/forks/dark/developervijay7/laravel-quickstart)](https://github.com/developervijay7/laravel-quickstart/network/members#gh-dark-mode-only)

