[TOC]

# Installation

## Installing Laravel

For this application we will be using [Laravel Sail](https://laravel.com/docs/sail), a light-weight command-line interface for interacting with Laravel's default Docker development environment. Before we get started, make sure to install [Docker](https://docs.docker.com/get-docker/) for your operating system. For alternative installation methods, check out our full [installation guide](https://laravel.com/docs/installation).

The easiest way to install Laravel is using our `laravel.build` service, which will download and create a fresh Laravel application for you. Launch a terminal and run the following command:

```shell
curl -s "https://laravel.build/chirper" | bash
```

By default, the installer will pre-configure Laravel Sail with a number of useful services for your application, including a MySQL database server. You may [customize the Sail services](https://laravel.com/docs/9.x/installation#choosing-your-sail-services) if needed.

After the project has been created, you can navigate to the application directory and start Laravel Sail:

```shell
cd chirper

./vendor/bin/sail up
```

> *Tip* You can [create an alias](https://laravel.com/docs/sail#configuring-a-bash-alias) that allows you execute Sail's commands more easily.

Once the application's Docker containers have been started, you can access the application in your web browser at: [http://localhost](http://localhost).

<img src="/img/screenshots/fresh.png" alt="A fresh Laravel installation" class="dark:hidden rounded-lg" />
<img src="/img/screenshots/fresh-dark.png" alt="A fresh Laravel installation" class="hidden dark:block rounded-lg" />

## Installing Laravel Breeze

Next, we will give your application a head-start by installing [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze), a minimal, simple implementation of all of Laravel's authentication features, including login, registration, password reset, email verification, and password confirmation. Once installed, your are encouraged to customize the components to suit your needs.

Laravel Breeze offer several options for your view layer, including simple Blade templates, or [Vue](https://vuejs.org/) and [React](https://reactjs.org/) with [Inertia](https://inertiajs.com/). For this tutorial, you have the option of Vue or React. Choose your stack below, and install the package and scaffolding with the given commands:

```sh tab=Vue
./vendor/bin/sail composer require laravel/breeze --dev

./vendor/bin/sail artisan breeze:install vue
```

```sh tab=React
./vendor/bin/sail composer require laravel/breeze --dev

./vendor/bin/sail artisan breeze:install react
```

Breeze will configure your front-end dependencies for you, so we can now install them and start the Vite development server:

```sh
npm install

npm run dev
```

And finally, in another terminal, we can now run the initial database migrations to populate our database with the default tables from Laravel and Breeze:

```sh
./vendor/bin/sail artisan migrate
```

If you refresh your Laravel application in the browser at [http://localhost](http://localhost), you may now follow the "Register" link at the top right to register a test account and log in.

<img src="/img/screenshots/register.png" alt="Laravel registration page" class="rounded-lg" />

[Continue to start creating chirps...](/creating-chirps)
