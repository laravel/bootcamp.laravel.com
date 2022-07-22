# Creating Chirps

Your application is now ready start development! Let's allow our users to post short messages called *Chirps*.

## Models, migrations, and controllers

There's a little bit to unpack here so let's break it down:

* [Models](https://laravel.com/docs/eloquent) provide a powerful and enjoyable interface for you to interact with the tables in your database.
* [Migrations](https://laravel.com/docs/migrations) allow you to easily create and modify the tables in your database. They guarantee that the same database structure exists everywhere that your application runs.
* [Controllers](https://laravel.com/docs/9.x/controllers) are responsible for accepting and processing HTTP requests and returning a HTTP response.

Almost every feature you build will involve all of these pieces working together in harmony, so the `artisan make:model` command can create them all for you at once.

Let's create a model, migration, and resource controller for our Chirps with the following command:

```sh
./vendor/bin/sail artisan make:model -mrc Chirp
```

This command will create three files for you:

* `app/Models/Chirp.php` - The Eloquent model.
* `database/migrations/<timestamp>_create_chirps_table.php` - The database migration that will create your database table.
* `app/Http/Controller/ChirpController.php` - The HTTP controller that will take incoming requests and return responses.

## Routing

We will also need to create URLs for our controller. We can do this by adding "routes" for it, which are managed in the `routes` directory in your project. Because we're using a resource controller, we can use a single `Route::resource()` statement to define all of the routes following a conventional URL structure.

To start with, we are going to enable two routes. The `index` route will display our form and a listing of Chirps, and the `store` route will be used for saving new Chirps. We are also going to place these routes behind two "middleware", `auth` and `verified`. The `auth` middleware ensures that only logged-in users can access the route, and the `verified` middleware will be used if you decide to enable [email verification](https://laravel.com/docs/verification).

```php
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

This will create the following route:

Verb      | URI                    | Action       | Route Name
----------|------------------------|--------------|---------------------
GET       | `/chirps`              | index        | chirps.index
POST      | `/chirps`              | store        | chirps.store

Let's test this out by returning a test message from the `index()` method of our controller at `app/Http/Controllers/ChirpController.php`:

```php
<?php
// [tl! collapse:start]
namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
// [tl! collapse:end]
class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return 'Hello, World!';// [tl! remove:-1,1 add]
    }
    // [tl! collapse:start]
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
    // [tl! collapse:end]
}
```

If you are still logged in from earlier, you should see your message when navigating to [http://localhost/chirps](http://localhost/chirps)!

## Inertia

Not impressed yet? Let's use Inertia to render a Vue component with a form for creating new chirps:

```php
<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Inertia\Inertia;// [tl! add]

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return 'Hello, World!';// [tl! remove]
        return Inertia::render('Chirps/Index', [// [tl! add:start]
            //
        ]);// [tl! add:end]
    }
    // [tl! collapse:start]
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
    // [tl! collapse:end]
}
```

We'll then need to create our new Vue component at `resources/js/Pages/Chirps/Index.vue`:

```vue
<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeButton from '@/Components/Button.vue';
import BreezeInputError from '@/Components/InputError.vue';
import { useForm, Head } from '@inertiajs/inertia-vue3';

const form = useForm({
    message => '',
});
</script>

<template>
    <Head title="Chirps" />

    <BreezeAuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('chirps.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.message"
                    placeholder="What's on your mind?"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <BreezeInputError :message="form.errors.message" class="mt-2" />
                <BreezeButton class="mt-4">Chirp</BreezeButton>
            </form>
        </div>
    </BreezeAuthenticatedLayout>
</template>
```

That's it! Refresh the page at [http://localhost/chirps](http://localhost/chirps) and you should see your new form rendered in the default layout provided by Breeze!

<img src="/img/screenshots/chirp-form.png" alt="Chirp form" class="rounded-lg" />

## Navigation menu

Let take a moment to add a link to the navigation menu provided by Breeze.

Open `resources/js/Layouts/Authenticated.vue` and add menu item for both the desktop and mobile versions of our application:

```vue
<template><!-- [tl! .hidden]
<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <BreezeNavLink :href="route('dashboard')" :active="route().current('dashboard')">
        Dashboard
    </BreezeNavLink>
    <BreezeNavLink :href="route('chirps.index')" :active="route().current('chirps.index')"><!-- [tl! add:start] -->
        Chirps
    </BreezeNavLink><!-- [tl! add:end] -->
</div>
</template><!-- [tl! .hidden]
```
```vue
<template><!-- [tl! .hidden]
<!-- Responsive Navigation Menu -->
<div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <BreezeResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
            Dashboard
        </BreezeResponsiveNavLink>
        <BreezeResponsiveNavLink :href="route('chirps.index')" :active="route().current('chirps.index')"><!-- [tl! add:start] -->
            Chirps
        </BreezeResponsiveNavLink><!-- [tl! add:end] -->
    </div>
    <!-- [tl! collapse:start] -->
    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">
                Log Out
            </BreezeResponsiveNavLink>
        </div>
    </div><!-- [tl! collapse:end] -->
</div>
</template><!-- [tl! .hidden]
```

## Saving the chirp

Our form has been configured to post messages to the `chirps.store` route that we created earlier. Let's update the `store()` method on `ChirpController` to receive and validate the data before creating a new Chirp:

```php
<?php
// [tl! collapse:start]
namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Inertia\Inertia;
// [tl! collapse:end]
class ChirpController extends Controller
{
    // [tl! collapse:start]
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Chirps/Index', [
            //
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    // [tl! collapse:end]
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
    // [tl! collapse:end]
}
```

We're using Laravel's powerful validation features to ensure that the user provides a message, and that it won't exceed 255 characters.

We're then creating a record that will belong to the logged in user by leveraging a `chirps()` relationship that we will create next.

And then finally, when using Inertia, we can return a `redirect()` to instruct Inertia to reload our `index` page.

## Creating a relationship

You may have noticed in the previous step that we called a `chirps()` method on the `$request->user()` object. This method doesn't actually exist yet, but it would be nice if it did. We can do this by creating a "has many" relationship on our `app/Models/User.php` model:

```php
<?php
// [tl! collapse:start]
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// [tl! collapse:end]
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
    public function chirps()// [tl! add:start]
    {
        return $this->hasMany(Chirp::class);
    }// [tl! add:end]
}
```

Laravel offers many different types of model relationships that you can read more about in the [Eloquent Relationships](https://laravel.com/docs/eloquent-relationships) documentation.

## Mass assignment protection

Passing all of the data from a request to your model can be risky. Imagine you have a page where users can edit their profiles. If you were to pass the entire request to the model, then a user could edit *any* column they like, such as an `is_admin` column. This is called a *mass assignment vulnerability*.

Laravel protects you from accidentally doing this by blocking mass assignment by default. Mass assignment is very convenient though, as it prevents you from having to assign each attribute one-by-one. We can enable mass assignment for specific attributes my marking them as "fillable".

Open your `app/Models/Chirp.php` file and add a `$fillable` property that includes our `messages` attribute:

```php
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

## Updating the migration

The only thing missing is the extra columns in the database to store the relationship between a `Chirp` and its `User`, and the message itself. Remember the database migration we created earlier at `databases/migration/<timestamp>_create_chirps_table.php`? It's time to open that file to add some extra columns:

```php
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
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chirps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');// [tl! add]
            $table->string('message');// [tl! add]
            $table->timestamps();
        });
    }
    // [tl! collapse:start]
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chirps');
    }
    // [tl! collapse:end]
};
```

We haven't migrated the database since we added this migration, so go ahead and do it now:

```sh
./vendor/bin/sail artisan migrate
```

> *Note* Each database migration will only be run once. To make additional changes to a table, you will need to create another migration. During development, you may wish to update an existing undeployed migration and then recreate your database from scratch using the `./vendor/bin/sail artisan migrate:fresh` command.

## Testing it out

We're now ready to send a "chirp" from the form we added to [http://localhost/chirps](http://localhost/chirps)! You won't be able to see the result yet because we haven't displayed existing chirps on the page.

If you leave the message field empty, or enter more than 255 characters, then you'll see your validation in action.

## Artisan Tinker

This is great time to learn about [Artisan Tinker](https://laravel.com/docs/9.x/artisan#tinker), a *REPL* ([Read-eval-print loop](https://en.wikipedia.org/wiki/Read%E2%80%93eval%E2%80%93print_loop)) where you can execute arbitrary PHP code in your Laravel application.

In your console, start a new tinker session:

```sh
./vendor/bin/sail artisan tinker
```

Next, execute the following code to display the Chirps in your database:

```sh
Chirp::all();
```

```
=> Illuminate\Database\Eloquent\Collection {#4512
     all: [
       App\Models\Chirp {#4514
         id: 1,
         user_id: 1,
         message: "I'm building a new microblogging platform with Laravel!",
         created_at: "2022-07-10 04:47:10",
         updated_at: "2022-07-10 04:47:10",
       },
     ],
   }
```

You may exit tinker by using the `exit` command, or by pressing <kbd>Ctrl</kbd> + <kbd>c</kbd>.
