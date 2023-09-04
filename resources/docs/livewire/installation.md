[TOC]

# <b>02.</b> Installation

## Installing Laravel

### Quick Installation

If you have already [installed PHP and Composer on your local machine](https://herd.laravel.com), you may create a new Laravel project via Composer:

```shell
composer create-project laravel/laravel chirper
```

After the project has been created, start Laravel's local development server using the Laravel's Artisan CLI serve command:

```none
cd chirper

php artisan serve
```

Once you have started the Artisan development server, your application will be accessible in your web browser at [http://localhost:8000](http://localhost:8000).

<img src="/img/screenshots/fresh.png" alt="A fresh Laravel installation" class="dark:hidden rounded-lg border shadow-lg" />
<img src="/img/screenshots/fresh-dark.png" alt="A fresh Laravel installation" class="hidden dark:block rounded-lg border-gray-700 shadow-lg" />

For simplicity, you may use SQLite to store your application's data. To instruct Laravel to use SQLite instead of MySQL, update your new application's `.env` file and remove all of the `DB_*` environment variables except for the `DB_CONNECTION` variable, which should be set to `sqlite`:

```ini
DB_CONNECTION=sqlite
```

### Installation via Docker

If you do not have PHP installed locally, you may develop your application using [Laravel Sail](https://laravel.com/docs/sail), a light-weight command-line interface for interacting with Laravel's default Docker development environment, which is compatible with all operating systems. Before we get started, make sure to install [Docker](https://docs.docker.com/get-docker/) for your operating system. For alternative installation methods, check out our full [installation guide](https://laravel.com/docs/installation).

The easiest way to install Laravel is using our `laravel.build` service, which will download and create a fresh Laravel application for you. Launch a terminal and run the following command:

```shell
curl -s "https://laravel.build/chirper" | bash
```

Sail installation may take several minutes while Sail's application containers are built on your local machine.

By default, the installer will pre-configure Laravel Sail with a number of useful services for your application, including a MySQL database server. You may [customize the Sail services](https://laravel.com/docs/installation#choosing-your-sail-services) if needed.

After the project has been created, you can navigate to the application directory and start Laravel Sail:

```shell
cd chirper

./vendor/bin/sail up
```

> **Note**
> You can [create a shell alias](https://laravel.com/docs/sail#configuring-a-shell-alias) that allows you execute Sail's commands more easily.

 When developing applications using Sail, you may execute Artisan, NPM, and Composer commands via the Sail CLI instead of invoking them directly:

```shell
./vendor/bin/sail php --version
./vendor/bin/sail artisan --version
./vendor/bin/sail composer --version
./vendor/bin/sail npm --version
```

Once the application's Docker containers have been started, you can access the application in your web browser at: [http://localhost](http://localhost).

<img src="/img/screenshots/fresh.png" alt="A fresh Laravel installation" class="dark:hidden rounded-lg border shadow-lg" />
<img src="/img/screenshots/fresh-dark.png" alt="A fresh Laravel installation" class="hidden dark:block rounded-lg border-gray-700 shadow-lg" />

## Installing Livewire

Now that we have a fresh Laravel application set up, we can install both Livewire and Livewire Volt. The latter allows a Livewire component's PHP logic and Blade templates to coexist in the same file.

Open a new terminal in your `chirper` project directory and install Livewire with the given command:

```shell 
composer require livewire/livewire livewire/volt

php artisan volt:install
```

Then, include the Livewire JavaScript and CSS assets in your application's main Blade layout file, `resources/views/layouts/app.blade.php`:

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- [tl! collapse:start] -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- [tl! collapse:end] -->
        <!-- [tl! add:start] -->
        @livewireStyles <!-- [tl! add:end] -->
    </head>
    <body class="font-sans antialiased">
        <!-- [tl! collapse:start] -->
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div> <!-- [tl! collapse:end] -->
        <!-- [tl! add:start] -->
        @livewireScripts <!-- [tl! add:end] -->
    </body>
</html>
```

## Installing Laravel Breeze

Next, we will give your application a head-start by installing [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze), a minimal, simple implementation of all of Laravel's authentication features, including login, registration, password reset, email verification, and password confirmation. Once installed, you are welcome to customize the components to suit your needs.

Laravel Breeze offers several options for your view layer, including Blade templates, or [Vue](https://vuejs.org/) and [React](https://reactjs.org/) with [Inertia](https://inertiajs.com/). Because Livewire uses Blade templates under the hood, we'll be using Blade for this tutorial.

Open a new terminal in your `chirper` project directory and install your chosen stack with the given commands:

```shell
composer require laravel/breeze --dev

php artisan breeze:install blade
```

Now, because Livewire brings its own Alpine.js dependency, we can remove the Alpine.js from the `resources/js/app.js` file:

```js
import './bootstrap';
// [tl! remove:start]
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start(); // [tl! remove:end]
```

Breeze will install and configure your front-end dependencies for you, so we just need to start the Vite development server to automatically recompile our CSS and refresh the browser when we make changes to our Blade templates:

```shell
npm run dev
```

Finally, open another terminal in your `chirper` project directory and run the initial database migrations to populate the database with the default tables from Laravel and Breeze:

```shell
php artisan migrate
```

If you refresh your new Laravel application in the browser, you should now see a "Register" link at the top-right. Follow that to see the registration form provided by Laravel Breeze.

<img src="/img/screenshots/register.png" alt="Laravel registration page" class="rounded-lg border dark:border-none shadow-lg" />

Register yourself an account and log in!

[Continue to start creating Chirps...](/livewire/creating-chirps)
