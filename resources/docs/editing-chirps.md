# Editing Chirps

We don't want Chirper to be like other popular bird-themed microblogging platforms, so let's allow our users to edit their Chirps.

## Route

`routes/web.php`

```php
<?php
// [tl! collapse:start]
use App\Http\Controllers\ChirpController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// [tl! collapse:end]
Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store'])// [tl! remove]
    ->only(['index', 'store', 'update'])// [tl! add]
    ->middleware(['auth', 'verified']);
// [tl! collapse:start]
require __DIR__.'/auth.php';
// [tl! collapse:end]
```

## Updating our component

`resources/js/Components/Chirp.vue`

```vue
<script setup>
import BreezeButton from '@/Components/Button.vue';// [tl! add]
import BreezeInputError from '@/Components/InputError.vue';// [tl! add]
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import { useForm } from '@inertiajs/inertia-vue3';// [tl! add]
import { ref } from 'vue';// [tl! add]

dayjs.extend(relativeTime);

defineProps(['chirp']);// [tl! remove]
const props = defineProps(['chirp']);// [tl! add:start]

const form = useForm({
    message: props.chirp.message
})

const editing = ref(false)// [tl! add:end]
</script>

<template>
    <div class="p-6 flex space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <div class="flex-1">
            <div class="text-gray-800">{{ chirp.user.name }} <small class="text-sm text-gray-600">{{ dayjs(chirp.created_at).fromNow() }}</small></div><!-- [tl! remove] -->
            <div class="text-gray-800">{{ chirp.user.name }} <small class="text-sm text-gray-600">{{ dayjs(chirp.created_at).fromNow() }}<span v-if="chirp.created_at !== chirp.updated_at"> (edited)</span></small></div><!-- [tl! add] -->
            <p class="mt-4 text-lg text-gray-900">{{ chirp.message }}</p><!-- [tl! remove ] -->
            <!-- [tl! add:start] -->
            <form
                v-if="editing"
                @submit.prevent="form.put(route('chirps.update', chirp.id), { onSuccess: editing = false })"
            >
                <textarea
                    v-model="form.message"
                    class="mt-4 w-full text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <BreezeInputError :message="form.errors.message" class="mt-2" />
                <div class="space-x-2">
                    <BreezeButton class="mt-4">Save</BreezeButton>
                    <button class="mt-4" @click="editing = false; form.reset()">Cancel</button>
                </div>
            </form>

            <div v-else>
                <p class="mt-4 text-lg text-gray-900">{{ chirp.message }}</p>
                <button
                    v-if="chirp.user.id === $page.props.auth.user.id"
                    class="mt-2 text-sm"
                    @click="editing = true"
                >edit</button>
            </div><!-- [tl! add:end] -->
        </div>
    </div>
</template>
```

## Updating our controller

`app/Http/Controllers/ChirpController.php`

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
    public function index()
    {
        return Inertia::render('Chirps/Index', [
            'chirps' => Chirp::with('user:id,name')->latest()->get(),
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
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
    // [tl! collapse:end]
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
        $this->authorize('update', $chirp);// [tl! remove:-1,1 add:start]

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect(route('chirps.index'));// [tl! add:end]
    }
    // [tl! collapse:start]
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

## Authorization

```sh
./vendor/bin/sail artisan make:policy -m Chirp ChirpPolicy
```

`app/Policies/ChirpPolicy.php`

```php
<?php
// [tl! collapse:start]
namespace App\Policies;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
// [tl! collapse:end]
class ChirpPolicy
{
    // [tl! collapse:start]
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Chirp $chirp)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }
    // [tl! collapse:end]
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Chirp $chirp)
    {
        //
        return $user->id === $chirp->user_id; // [tl! remove:-1,1 add]
    }
    // [tl! collapse:start]
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Chirp $chirp)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Chirp $chirp)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Chirp $chirp)
    {
        //
    }
    // [tl! collapse:end]
}
```
