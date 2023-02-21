[TOC]

# <b>06.</b> Deleting Chirps

Sometimes no amount of editing can fix a message, so let's give our users the ability to delete their Chirps.

Hopefully you're starting to get the hang of things now. We think you'll be impressed how quickly we can add this feature.

## Routing

We'll start again by updating our routes to enable the `chirps.destroy` route:

```php filename=routes/web.php
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
    ->only(['index', 'store', 'update'])// [tl! remove]
    ->only(['index', 'store', 'update', 'destroy'])// [tl! add]
    ->middleware(['auth', 'verified']);
// [tl! collapse:start]
require __DIR__.'/auth.php';
// [tl! collapse:end]
```

Our route table for this controller now looks like this:

Verb      | URI                    | Action       | Route Name
----------|------------------------|--------------|---------------------
GET       | `/chirps`              | index        | chirps.index
POST      | `/chirps`              | store        | chirps.store
PUT/PATCH | `/chirps/{chirp}`      | update       | chirps.update
DELETE    | `/chirps/{chirp}`      | destroy      | chirps.destroy

## Updating our controller

Now we can update the `destroy` method on our `ChirpController` class to perform the deletion and return to the Chirp index:

```php filename=app/Http/Controllers/ChirpController.php
<?php
// [tl! collapse:start]
namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
// [tl! collapse:end]
class ChirpController extends Controller
{
    // [tl! collapse:start]
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Chirps/Index', [
            'chirps' => Chirp::with('user:id,name')->latest()->get(),
        ]);
    }

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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
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
    public function update(Request $request, Chirp $chirp): RedirectResponse
    {
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }
     // [tl! collapse:end]
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)// [tl! remove]
    public function destroy(Chirp $chirp): RedirectResponse// [tl! add]
    {
        //
        $this->authorize('delete', $chirp);// [tl! remove:-1,1 add:start]

        $chirp->delete();

        return redirect(route('chirps.index'));// [tl! add:end]
    }
}
```

## Authorization

As with editing, we only want our Chirp authors to be able to delete their Chirps, so let's update the `delete` method our `ChirpPolicy` class:

```php filename=app/Policies/ChirpPolicy.php
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
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Chirp $chirp): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chirp $chirp): bool
    {
        return $chirp->user()->is($user);
    }
    // [tl! collapse:end]
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chirp $chirp): bool
    {
        //
        return $this->update($user, $chirp);// [tl! remove:-1,1 add]
    }
    // [tl! collapse:start]
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chirp $chirp): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chirp $chirp): bool
    {
        //
    }
    // [tl! collapse:end]
}
```

Rather than repeating the logic from the `update` method, we can define the same logic by calling the `update` method from our `destroy` method. Anyone that is authorized to update a Chirp will now be authorized to delete it as well.

## Updating our component

Finally, we can add a delete button to the dropdown menu we created earlier in our `Chirp` component:

```vue tab=Vue filename=resources/js/Components/Chirp.vue
<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';// [tl! add]
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
// [tl! collapse:start]
dayjs.extend(relativeTime);

const props = defineProps(['chirp']);

const form = useForm({
    message: props.chirp.message,
});

const editing = ref(false);
// [tl! collapse:end]
</script>

<template>
    <div class="p-6 flex space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <div class="flex-1">
            <div class="flex justify-between items-center">
                <div>
                    <span class="text-gray-800">{{ chirp.user.name }}</span>
                    <small class="ml-2 text-sm text-gray-600">{{ dayjs(chirp.created_at).fromNow() }}</small>
                    <small v-if="chirp.created_at !== chirp.updated_at" class="text-sm text-gray-600"> &middot; edited</small>
                </div>
                <Dropdown v-if="chirp.user.id === $page.props.auth.user.id">
                    <template #trigger>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                    </template>
                    <template #content>
                        <button class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out" @click="editing = true">
                            Edit
                        </button>
                        <DropdownLink as="button" :href="route('chirps.destroy', chirp.id)" method="delete"><!-- [tl! add:start] -->
                            Delete
                        </DropdownLink><!-- [tl! add:end] -->
                    </template>
                </Dropdown>
            </div>
            <form v-if="editing" @submit.prevent="form.put(route('chirps.update', chirp.id), { onSuccess: () => editing = false })">
                <textarea v-model="form.message" class="mt-4 w-full text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <div class="space-x-2">
                    <PrimaryButton class="mt-4">Save</PrimaryButton>
                    <button class="mt-4" @click="editing = false; form.reset(); form.clearErrors()">Cancel</button>
                </div>
            </form>
            <p v-else class="mt-4 text-lg text-gray-900">{{ chirp.message }}</p>
        </div>
    </div>
</template>
```

```javascript tab=React filename=resources/js/Components/Chirp.jsx
import React, { useState } from 'react';
import Dropdown from '@/Components/Dropdown';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import { useForm, usePage } from '@inertiajs/react';

dayjs.extend(relativeTime);

export default function Chirp({ chirp }) {
    const { auth } = usePage().props;

    const [editing, setEditing] = useState(false);

    const { data, setData, patch, processing, reset, errors } = useForm({
        message: chirp.message,
    });

    const submit = (e) => {
        e.preventDefault();
        patch(route('chirps.update', chirp.id), { onSuccess: () => setEditing(false) });
    };
    // [tl! add:26,3]
    return (
        <div className="p-6 flex space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                <path strokeLinecap="round" strokeLinejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <div className="flex-1">
                <div className="flex justify-between items-center">
                    <div>
                        <span className="text-gray-800">{chirp.user.name}</span>
                        <small className="ml-2 text-sm text-gray-600">{dayjs(chirp.created_at).fromNow()}</small>
                        { chirp.created_at !== chirp.updated_at && <small className="text-sm text-gray-600"> &middot; edited</small>}
                    </div>
                    {chirp.user.id === auth.user.id &&
                        <Dropdown>
                            <Dropdown.Trigger>
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" className="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </Dropdown.Trigger>
                            <Dropdown.Content>
                                <button className="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out" onClick={() => setEditing(true)}>
                                    Edit
                                </button>
                                <Dropdown.Link as="button" href={route('chirps.destroy', chirp.id)} method="delete">
                                    Delete
                                </Dropdown.Link>
                            </Dropdown.Content>
                        </Dropdown>
                    }
                </div>
                {editing
                    ? <form onSubmit={submit}>
                        <textarea value={data.message} onChange={e => setData('message', e.target.value)} className="mt-4 w-full text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                        <InputError message={errors.message} class="mt-2" />
                        <div className="space-x-2">
                            <PrimaryButton className="mt-4">Save</PrimaryButton>
                            <button className="mt-4" onClick={() => setEditing(false) && reset()}>Cancel</button>
                        </div>
                    </form>
                    : <p className="mt-4 text-lg text-gray-900">{chirp.message}</p>
                }
            </div>
        </div>
    )
}
```

## Testing it out

If you Chirped anything you weren't happy with, try deleting it!

<img src="/img/screenshots/chirp-delete.png" alt="Deleting a chirp" class="rounded-lg border dark:border-none shadow-lg" />

[Continue to notifications & events...](/inertia/notifications-and-events)
