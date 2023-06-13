[TOC]

# <b>03.</b> Creating Chirps

You're now ready to start building your new application! Let's allow our users to post short messages called *Chirps*.

## Models, migrations, and controllers

To allow users to post Chirps, we will need to create models, migrations, and controllers. Let's explore each of these concepts a little deeper:

* [Models](https://laravel.com/docs/eloquent) provide a powerful and enjoyable interface for you to interact with the tables in your database.
* [Migrations](https://laravel.com/docs/migrations) allow you to easily create and modify the tables in your database. They ensure that the same database structure exists everywhere that your application runs.
* [Controllers](https://laravel.com/docs/controllers) are responsible for processing requests made to your application and returning a response.

Almost every feature you build will involve all of these pieces working together in harmony, so the `artisan make:model` command can create them all for you at once.

Let's create a model, migration, and resource controller for our Chirps with the following command:

```shell
php artisan make:model -mrc Chirp
```

> **Note**
> You can see all the available options by running the `php artisan make:model --help` command.

This command will create three files for you:

* `app/Models/Chirp.php` - The Eloquent model.
* `database/migrations/<timestamp>_create_chirps_table.php` - The database migration that will create your database table.
* `app/Http/Controllers/ChirpController.php` - The HTTP controller that will take incoming requests and return responses.

## Routing

We will also need to create URLs for our controller. We can do this by adding "routes", which are managed in the `routes` directory of your project. Because we're using a resource controller, we can use a single `Route::resource()` statement to define all of the routes following a conventional URL structure.

To start with, we are going to enable two routes:

* The `index` route will display our form and a listing of Chirps.
* The `store` route will be used for saving new Chirps.

We are also going to place these routes behind two [middleware](https://laravel.com/docs/middleware):
* The `auth` middleware ensures that only logged-in users can access the route.
* The `verified` middleware will be used if you decide to enable [email verification](https://laravel.com/docs/verification).

```php filename=routes/web.php
<?php

use App\Http\Controllers\ChirpController;// [tl! add]
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
// [tl! collapse:start]
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
// [tl! collapse:end]
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('chirps', ChirpController::class)// [tl! add:start]
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);// [tl! add:end]

require __DIR__.'/auth.php';
```

This will create the following routes:

Verb      | URI                    | Action       | Route Name
----------|------------------------|--------------|---------------------
GET       | `/chirps`              | index        | chirps.index
POST      | `/chirps`              | store        | chirps.store

> **Note**
> You may view all of the routes for your application by running the `php artisan route:list` command.

Let's test our route and controller by returning a test message from the `index` method of our new `ChirpController` class:

```php filename=app/Http/Controllers/ChirpController.php
<?php
// [tl! collapse:start]
namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request; // [tl! collapse:end]
use Illuminate\Http\Response; // [tl! 1 add]

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    public function index(): Response // [tl! remove:-1,1 add]
    {
        //
        return response('Hello, World!');// [tl! remove:-1,1 add]
    }
    // [tl! collapse:start]
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
    // [tl! collapse:end]
}
```

If you are still logged in from earlier, you should see your message when navigating to [http://localhost:8000/chirps](http://localhost:8000/chirps), or [http://localhost/chirps](http://localhost/chirps) if you're using Sail!

## Inertia

Not impressed yet? Let's update the `index` method of our `ChirpController` class to render a front-end page component using Inertia. Inertia is what links our Laravel application with our Vue or React front-end:

```php filename=app/Http/Controllers/ChirpController.php
<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;// [tl! remove]
use Inertia\Inertia;// [tl! add]
use Inertia\Response;// [tl! add]

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return 'Hello, World!';// [tl! remove]
        return Inertia::render('Chirps/Index', [// [tl! add:start]
            //
        ]);// [tl! add:end]
    }
    // [tl! collapse:start]
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
    // [tl! collapse:end]
}
```

We can then create our front-end `Chirps/Index` page component with a form for creating new Chirps:

```vue tab=Vue filename=resources/js/Pages/Chirps/Index.vue
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

const form = useForm({
    message: '',
});
</script>

<template>
    <Head title="Chirps" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('chirps.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.message"
                    placeholder="What's on your mind?"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Chirp</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
```

```javascript tab=React filename=resources/js/Pages/Chirps/Index.jsx
import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import { useForm, Head } from '@inertiajs/react';

export default function Index({ auth }) {
    const { data, setData, post, processing, reset, errors } = useForm({
        message: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('chirps.store'), { onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Chirps" />

            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <form onSubmit={submit}>
                    <textarea
                        value={data.message}
                        placeholder="What's on your mind?"
                        className="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        onChange={e => setData('message', e.target.value)}
                    ></textarea>
                    <InputError message={errors.message} className="mt-2" />
                    <PrimaryButton className="mt-4" disabled={processing}>Chirp</PrimaryButton>
                </form>
            </div>
        </AuthenticatedLayout>
    );
}
```

That's it! Refresh the page in your browser to see your new form rendered in the default layout provided by Breeze!

<img src="/img/screenshots/chirp-form.png" alt="Chirp form" class="rounded-lg border dark:border-none shadow-lg" />

Now that our front-end is powered by JavaScript, any changes we make to our JavaScript templates will be automatically reloaded in the browser whenever the Vite development server is running via `npm run dev`.

## Navigation menu

Let's take a moment to add a link to the navigation menu provided by Breeze.

Update the `AuthenticatedLayout` component provided by Breeze to add a menu item for desktop screens:

```vue tab=Vue filename=resources/js/Layouts/AuthenticatedLayout.vue
<template><!-- [tl! .hidden] -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
        Dashboard
    </NavLink>
    <NavLink :href="route('chirps.index')" :active="route().current('chirps.index')"><!-- [tl! add:start] -->
        Chirps
    </NavLink><!-- [tl! add:end] -->
</div>
</template><!-- [tl! .hidden] -->
```
```javascript tab=React filename=resources/js/Layouts/AuthenticatedLayout.jsx
// [tl! add:6,3 .hidden:0,2 .hidden:10,1]
return (
<div className="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <NavLink href={route('dashboard')} active={route().current('dashboard')}>
        Dashboard
    </NavLink>
    <NavLink href={route('chirps.index')} active={route().current('chirps.index')}>
        Chirps
    </NavLink>
</div>
)
```

And also for mobile screens:

```vue tab=Vue filename=resources/js/Layouts/AuthenticatedLayout.vue
<template><!-- [tl! .hidden] -->
<div class="pt-2 pb-3 space-y-1">
    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
        Dashboard
    </ResponsiveNavLink>
    <ResponsiveNavLink :href="route('chirps.index')" :active="route().current('chirps.index')"><!-- [tl! add:start] -->
        Chirps
    </ResponsiveNavLink><!-- [tl! add:end] -->
</div>
</template><!-- [tl! .hidden] -->
```
```javascript tab=React filename=resources/js/Layouts/AuthenticatedLayout.jsx
// [tl! add:6,3 .hidden:0,2 .hidden:10,1]
return (
<div className="pt-2 pb-3 space-y-1">
    <ResponsiveNavLink href={route('dashboard')} active={route().current('dashboard')}>
        Dashboard
    </ResponsiveNavLink>
    <ResponsiveNavLink href={route('chirps.index')} active={route().current('chirps.index')}>
        Chirps
    </ResponsiveNavLink>
</div>
)
```

## Saving the Chirp

Our form has been configured to post messages to the `chirps.store` route that we created earlier. Let's update the `store` method on our `ChirpController` class to validate the data and create a new Chirp:

```php filename=app/Http/Controllers/ChirpController.php
<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;// [tl! add]
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChirpController extends Controller
{
    // [tl! collapse:start]
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Chirps/Index', [
            //
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    // [tl! collapse:end]
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)// [tl! remove]
    public function store(Request $request): RedirectResponse// [tl! add]
    {
        //
        $validated = $request->validate([// [tl! remove:-1,1 add:start]
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));// [tl! add:end]
    }
    // [tl! collapse:start]
    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
    // [tl! collapse:end]
}
```

We're using Laravel's powerful validation feature to ensure that the user provides a message and that it won't exceed the 255 character limit of the database column we'll be creating.

We're then creating a record that will belong to the logged in user by leveraging a `chirps` relationship. We will define that relationship soon.

Finally, when using Inertia, we can return a redirect response to instruct Inertia to reload our `chirps.index` route.

## Creating a relationship

You may have noticed in the previous step that we called a `chirps` method on the `$request->user()` object. We need to create this method on our `User` model to define a ["has many"](https://laravel.com/docs/eloquent-relationships#one-to-many) relationship:

```php filename=app/Models/User.php
<?php
// [tl! collapse:start]
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;// [tl! collapse:end]
use Illuminate\Database\Eloquent\Relations\HasMany;// [tl! add]
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // [tl! collapse:start]
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // [tl! collapse:end]
    public function chirps(): HasMany// [tl! add:start]
    {
        return $this->hasMany(Chirp::class);
    }// [tl! add:end]
}
```

> **Note**
> Laravel offers many different types of model relationships that you can read more about in the [Eloquent Relationships](https://laravel.com/docs/eloquent-relationships) documentation.

## Mass assignment protection

Passing all of the data from a request to your model can be risky. Imagine you have a page where users can edit their profiles. If you were to pass the entire request to the model, then a user could edit *any* column they like, such as an `is_admin` column. This is called a [mass assignment vulnerability](https://en.wikipedia.org/wiki/Mass_assignment_vulnerability).

Laravel protects you from accidentally doing this by blocking mass assignment by default. Mass assignment is very convenient though, as it prevents you from having to assign each attribute one-by-one. We can enable mass assignment for safe attributes by marking them as "fillable".

Let's add the `$fillable` property to our `Chirp` model to enable mass-assignment for the `message` attribute:

```php filename=app/Models/Chirp.php
<?php
// [tl! collapse:start]
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// [tl! collapse:end]
class Chirp extends Model
{
    // [tl! collapse:start]
    use HasFactory;
    // [tl! collapse:end]
    protected $fillable = [// [tl! add:start]
        'message',
    ];// [tl! add:end]
}
```

You can learn more about Laravel's mass assignment protection in the [documentation](https://laravel.com/docs/eloquent#mass-assignment).

## Updating the migration

The only thing missing is extra columns in our database to store the relationship between a `Chirp` and its `User` and the message itself. Remember the database migration we created earlier? It's time to open that file to add some extra columns:

```php filename=databases/migration/&amp;lt;timestamp&amp;gt;_create_chirps_table.php
<?php
// [tl! collapse:start]
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// [tl! collapse:end]
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chirps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();// [tl! add]
            $table->string('message');// [tl! add]
            $table->timestamps();
        });
    }
    // [tl! collapse:start]
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
    // [tl! collapse:end]
};
```

We haven't migrated the database since we added this migration, so let do it now:

```shell
php artisan migrate
```

> **Warning**
> Each database migration will only be run once. To make additional changes to a table, you will need to create another migration. During development, you may wish to update an undeployed migration and rebuild your database from scratch using the `php artisan migrate:fresh` command.

## Testing it out

We're now ready to send a Chirp using the form we just created! We won't be able to see the result yet because we haven't displayed existing Chirps on the page.

<img src="/img/screenshots/chirp-form-filled.png" alt="Chirp form" class="rounded-lg border dark:border-none shadow-lg" />

If you leave the message field empty, or enter more than 255 characters, then you'll see the validation in action.

### Artisan Tinker

This is great time to learn about [Artisan Tinker](https://laravel.com/docs/artisan#tinker), a *REPL* ([Read-eval-print loop](https://en.wikipedia.org/wiki/Read%E2%80%93eval%E2%80%93print_loop)) where you can execute arbitrary PHP code in your Laravel application.

In your console, start a new tinker session:

```shell
php artisan tinker
```

Next, execute the following code to display the Chirps in your database:

```shell
Chirp::all();
```

```
=> Illuminate\Database\Eloquent\Collection {#4512
     all: [
       App\Models\Chirp {#4514
         id: 1,
         user_id: 1,
         message: "I'm building Chirper with Laravel!",
         created_at: "2022-08-24 13:37:00",
         updated_at: "2022-08-24 13:37:00",
       },
     ],
   }
```

You may exit Tinker by using the `exit` command, or by pressing <kbd>Ctrl</kbd> + <kbd>c</kbd>.

[Continue to start showing Chirps...](/inertia/showing-chirps)
