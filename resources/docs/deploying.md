[TOC]

# <b>08.</b> Deploying

Let's switch gears and look at how we can deploy our new Laravel application.

## Choosing a provider

Laravel can be deployed to any modern PHP hosting environment that meets Laravel's modest [server requirements](https://laravel.com/docs/deployment#server-requirements). However, configuring and managing a web server and database server takes our attention away from building applications and delivering value to our users. That's why we built [Laravel Forge](https://forge.laravel.com/?ref=bootcamp.laravel.com) and [Laravel Vapor](https://vapor.laravel.com/?ref=bootcamp.laravel.com).

#### Laravel Forge

Laravel Forge can create servers on various infrastructure providers such as DigitalOcean, Linode, AWS, and more. In addition, Forge installs and manages all of the tools needed to build robust Laravel applications, such as Nginx, MySQL, Redis, Memcached, Beanstalk, and more.

#### Laravel Vapor

Laravel Vapor is a serverless deployment platform for Laravel, powered by AWS. Launch your Laravel infrastructure on Vapor and fall in love with the scalable simplicity of serverless.

Both are fantastic options, but today we're going with Forge for it's simplicity, choice of providers, and for being budget-friendly on smaller applications. You can always move to Vapor later if you want the scalability of serverless.

Sign up for your free trial with [Laravel Forge](https://forge.laravel.com/?ref=bootcamp.laravel.com) and then pick your server provider:

* [DigitalOcean](https://try.digitalocean.com/freetrialoffer/) <small>($100 free credit available)</small>
* [Linode](https://www.linode.com/) <small>($50 free credit available)</small>
* [AWS](https://aws.amazon.com/free/) <small>(free tier available)</small>
* [Vultr](https://www.vultr.com/promo/try50/) <small>($50 free credit available)</small>
* [Hetzner](https://www.hetzner.com/)
* Custom VPS server

If you're not sure who to pick, we recommend [DigitalOcean](https://try.digitalocean.com/freetrialoffer/) for their generous credit, great user interface, and excellent features.

## Connecting to source control

Forge needs to know where to find your application's code, so you'll need an account with a source control provider, such as [GitHub](https://github.com/), [GitLab](https://gitlab.com/), or [Bitbucket](https://bitbucket.com).

You may then connect Forge to your provider by selecting it on Forge's welcome screen, or by visiting the *Source Control* section of your Forge account.

<img src="/img/screenshots/forge-source-control.png" alt="Source control screenshot" class="rounded-lg border dark:border-none shadow-lg" />

## Connecting to your server provider

Forge will need the API key for your server provider so that it can build your servers. You can connect to your server provider on the Forge welcome screen, or by visiting the *Server Providers* section of your Forge account.

<img src="/img/screenshots/forge-server-providers.png" alt="Server providers screenshot" class="rounded-lg border dark:border-none shadow-lg" />

Follow the instructions to create API credentials for Forge with your selected provider, and then enter the details to continue.

## Creating a server

Now that Forge is connected to your source control and server providers, we're ready to create our first server!

From the *Servers* page, click the *Create Server* button.

Next, select your server provider. You'll be presented with several options depending on your provider. The default options will be perfect for deploying Chirper, but we recommend reviewing all of the available options for your chosen provider to ensure everything matches your requirements and budget.

<img src="/img/screenshots/forge-create-server.png" alt="Create server screenshot" class="rounded-lg border dark:border-none shadow-lg" />

> **Note**
> We recommend starting with an "App Server", which will provision everything you need all on one server. You may destroy the server when you're finished to avoid unnecessary costs.

Creating a server takes about 10 minutes, depending on your provider and the options selected.

## Creating a site (optional)

Forge will automatically create a "default" site on your new server. This is perfect for deploying our application because we can visit it using the server's public IP address instead of purchasing a domain name.

If you would like to use a domain name then we recommend visiting the *Sites* tab of your server to delete the "default" site and create a new site. You may create as many sites as you need. You'll also have the option to create a database for your new site.

<img src="/img/screenshots/forge-new-site.png" alt="New site screenshot" class="rounded-lg border dark:border-none shadow-lg" />

Select your site, and then click on it's name in the heading to visit your site and see Forge's default site page.

## Creating a database

If you're using the "default" site, you will need to create a database for your application. You may create databases on the *Database* tab of your server.

<img src="/img/screenshots/forge-add-database.png" alt="Add database screenshot" class="rounded-lg border dark:border-none shadow-lg" />

You may leave the username and password fields empty to use the credentials generated by Forge when building your server.

## Installing a repository

We're ready to install a source control repository on our new site. If you haven't already, make sure to create a git repository for your application and push the source code up to the source control provider that you connected to Forge earlier.

Choose your site from the *Sites* tab of your server and then click *Git Repository*. Enter your repository name (e.g. `taylorotwell/chirper`) and select your branch. Be sure that "Install Composer Dependencies" is checked, and then install your repository to continue.

<img src="/img/screenshots/forge-install-repository.png" alt="Install repository screenshot" class="rounded-lg border dark:border-none shadow-lg" />

## Configuring your environment file

When installing your repository, Forge will copy the `.env.example` environment file from your repository. You may review your environment configuration file from the *Edit Files* menu of your site.

<img src="/img/screenshots/forge-site-environment.png" alt="Site environment screenshot" class="rounded-lg border dark:border-none shadow-lg" />

You should carefully review all of the values to ensure everything is configured correctly for your production environment.

Ensure that the `DB_*` values match the database you created earlier. If you created a dedicated database username and password, be sure to configure those as well.

If you would like to send emails from your application, you will need to review the `MAIL_*` values and add any additional variables that may be required for your chosen [mail provider](https://laravel.com/docs/mail#configuration).

If you would like to run a queue worker, ensure that the `QUEUE_CONNECTION` value matches your desired queue connection and that you have installed and configured any [prerequisites](https://laravel.com/docs/queues#driver-prerequisites).

## Configuring your deploy script

On the *App* tab for your site you may review the deploy script that Forge created for you.

<img src="/img/screenshots/forge-deploy-script.png" alt="Deploy script screenshot" class="rounded-lg border dark:border-none shadow-lg" />

Our application is using Node dependencies and Vite, so we'll need to add steps to install the dependencies and build our assets:

```env
cd /home/forge/default
git pull origin $FORGE_SITE_BRANCH

$FORGE_COMPOSER install --no-interaction --prefer-dist --optimize-autoloader
npm ci
npm run build
#[tl! add:-2,2]
( flock -w 10 9 || exit 1
    echo 'Restarting FPM...'; sudo -S service $FORGE_PHP_FPM reload ) 9>/tmp/fpmlock

if [ -f artisan ]; then
    $FORGE_PHP artisan migrate --force
fi
```

## Running a queue worker (optional)

If you've chosen to configure a [queue worker](https://laravel.com/docs/queues), you may now instruct Forge to start and manage the worker on the *Queue* tab of your site.

<img src="/img/screenshots/forge-new-worker.png" alt="New worker screenshot" class="rounded-lg border dark:border-none shadow-lg" />

## Running a task scheduler (optional)

If you've chosen to use Laravel's [task scheduling](https://laravel.com/docs/scheduling), you may configure Forge to run the scheduler on the *Scheduler* tab of your server. You will need to set the frequency to "every minute" so that the scheduler will check for due tasks on any schedule you may configure.

<img src="/img/screenshots/forge-new-scheduled-job.png" alt="New scheduled job screenshot" class="rounded-lg border dark:border-none shadow-lg" />

## Deploying

We're ready to deploy our application for the first time! Press the *Deploy Now* button, and then sit back while Forge runs your deploy script.

> **Note**
> You may enable *Quick Deploy* to automatically deploy your application every time you push to your main branch&mdash;perfect for a [continuous deployment](https://en.wikipedia.org/wiki/Continuous_deployment) environment.

You may review your deployment history on the *Deployments* tab.

Once complete, visit your site again to confirm everything has deployed successfully.

> **Warning**
> Don't forget to destroy your server from the *Meta* tab once you're finished with it to avoid any unnecessary charges from your server provider.

[Continue to conclusion and next steps...](/conclusion)
