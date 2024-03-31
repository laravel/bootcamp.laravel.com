# AI bootcamp Project

This is a [Laravel](https://laravel.com/docs/9.x) application created with its built-in
solution [Sail](https://laravel.com/docs/9.x/sail) for running Laravel project
using [Docker](https://www.docker.com/)


## Requirements for building and running the application

- [Composer](https://getcomposer.org/download/)
- [Docker](https://docs.docker.com/get-docker/)

## Application Build and Run

After cloning the repository, run these commands:

`composer install`

`cp .env.example .env`

Update your database environment variable in the `.env`

`./vendor/bin/sail up`

## Then finally test the application

Go to [http://localhost:8000](http://localhost:8000) in order to setup the application.

## Configuring A Shell Alias
By default, Sail commands are invoked using the vendor/bin/sail script that is included with all new Laravel applications:

`./vendor/bin/sail up`

However, instead of repeatedly typing `vendor/bin/sail` to execute Sail commands, you may wish to configure a shell alias that allows you to execute Sail's commands more easily:

`alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`

To make sure this is always available, you may add this to your shell configuration file in your home directory, such as `~/.zshrc` or `~/.bashrc`, and then restart your shell.

Once the shell alias has been configured, you may execute Sail commands by simply typing sail.

`sail up`

## Executing Artisan Commands
Laravel Artisan commands may be executed using the artisan command:

`sail artisan queue:work`

## Executing Node / NPM Commands
Node commands may be executed using the node command while NPM commands may be executed using the npm command:

`sail node --version`
 
`sail npm install`

`sail npm run watch`
If you wish, you may use Yarn instead of NPM:

`sail yarn install`

`sail yarn watch`

## Errors
If you encounter the following error when running the mysql container, use this command to fix the issue.

`The error message "Another process with pid 62 is using unix socket file" suggests that there might be another process already using the socket file that MySQL is trying to use.`

### Command
`sail artisan down --volumes & sail up`
