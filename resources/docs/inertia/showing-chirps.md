[TOC]

# <b>04.</b> Showing Chirps

In the previous step we added the ability to create Chirps, now we're ready to display them!

## Retrieving the Chirps

Let's update the `index` method our `ChirpController` class to pass Chirps from every user to our Index page:

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
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Chirps/Index', [
            //
            'chirps' => Chirp::with('user:id,name')->latest()->get(),// [tl! remove:-1,1 add]
        ]);
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

Here we've used Eloquent's `with` method to [eager-load](https://laravel.com/docs/eloquent-relationships#eager-loading) every Chirp's associated user's ID and name. We've also used the `latest` scope to return the records in reverse-chronological order.

> **Note**
> Returning all Chirps at once won't scale in production. Take a look at Laravel's powerful [pagination](https://laravel.com/docs/pagination) to improve performance.

## Connecting users to Chirps

We've instructed Laravel to return the `id` and `name` property from the `user` relationship so that we can display the name of the Chirp's author without returning other potentially sensitive information such as the author's email address. But, the Chirp's `user` relationship hasn't been defined yet. To fix this, let's add a new ["belongs to"](https://laravel.com/docs/eloquent-relationships#one-to-many-inverse) relationship to our `Chirp` model:

```php filename=app/Models/Chirp.php
<?php
// [tl! collapse:start]
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;// [tl! collapse:end]
use Illuminate\Database\Eloquent\Relations\BelongsTo;// [tl! add]

class Chirp extends Model
{
    // [tl! collapse:start]
    use HasFactory;

    protected $fillable = [
        'message',
    ];
    // [tl! collapse:end]
    public function user(): BelongsTo// [tl! add:start]
    {
        return $this->belongsTo(User::class);
    }// [tl! add:end]
}
```

This relationship is the inverse of the "has many" relationship we created earlier on the `User` model.

## Updating our component

Next, let's create a `Chirp` component for our front-end. This component will be responsible for displaying an individual Chirp:

```vue tab=Vue filename=resources/js/Components/Chirp.vue
<script setup>
defineProps(['chirp']);
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
                    <small class="ml-2 text-sm text-gray-600">{{ new Date(chirp.created_at).toLocaleString() }}</small>
                </div>
            </div>
            <p class="mt-4 text-lg text-gray-900">{{ chirp.message }}</p>
        </div>
    </div>
</template>
```

```javascript tab=React filename=resources/js/Components/Chirp.jsx
import React from 'react';

export default function Chirp({ chirp }) {
    return (
        <div className="p-6 flex space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                <path strokeLinecap="round" strokeLinejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <div className="flex-1">
                <div className="flex justify-between items-center">
                    <div>
                        <span className="text-gray-800">{chirp.user.name}</span>
                        <small className="ml-2 text-sm text-gray-600">{new Date(chirp.created_at).toLocaleString()}</small>
                    </div>
                </div>
                <p className="mt-4 text-lg text-gray-900">{chirp.message}</p>
            </div>
        </div>
    );
}
```

Finally, we will update our `Chirps/Index` page component to accept the `chirps` prop and render the Chirps below our form using our new component:

```vue tab=Vue filename=resources/js/Pages/Chirps/Index.vue
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Chirp from '@/Components/Chirp.vue';// [tl! add]
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

defineProps(['chirps']);// [tl! add]

const form = useForm({
    message: '',
});
</script>

<template>
    <Head title="Dashboard" />

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

            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y"><!-- [tl! add:start] -->
                <Chirp
                    v-for="chirp in chirps"
                    :key="chirp.id"
                    :chirp="chirp"
                />
            </div><!-- [tl! add:end] -->
        </div>
    </AuthenticatedLayout>
</template>
```

```javascript tab=React filename=resources/js/Pages/Chirps/Index.jsx
import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import Chirp from '@/Components/Chirp';// [tl! add]
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import { useForm, Head } from '@inertiajs/react';

export default function Index({ auth }) {// [tl! remove]
export default function Index({ auth, chirps }) {// [tl! add]
    const { data, setData, post, processing, reset, errors } = useForm({
      message: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('chirps.store'), { onSuccess: () => reset() })
    };

    return (
        <AuthenticatedLayout auth={auth}>
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

                <div className="mt-6 bg-white shadow-sm rounded-lg divide-y">
                    {chirps.map(chirp =>
                        <Chirp key={chirp.id} chirp={chirp} />
                    )}
                </div>
            </div>
        </AuthenticatedLayout>
    );
    // [tl! add:-8,5 .hidden]
}
```

Now take a look in your browser to see the message you Chirped earlier!

<img src="/img/screenshots/chirp-index.png" alt="Chirp listing" class="rounded-lg border dark:border-none shadow-lg" />

### Extra Credit: Relative dates

In our `Chirp` component we formatted the dates to be human-readable, but we can take that one step further by displaying relative dates using the popular [Day.js](https://day.js.org) library.

First, install the `dayjs` NPM package:

```shell
npm install dayjs
```

Then we can use this library in our `Chirp` component to display relative dates:

```vue tab=Vue filename=resources/js/Components/Chirp.vue
<script setup>
import dayjs from 'dayjs';// [tl! add]
import relativeTime from 'dayjs/plugin/relativeTime';// [tl! add]

dayjs.extend(relativeTime);// [tl! add]

defineProps(['chirp']);
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
                    <small class="ml-2 text-sm text-gray-600">{{ new Date(chirp.created_at).toLocaleString() }}</small><!-- [tl! remove] -->
                    <small class="ml-2 text-sm text-gray-600">{{ dayjs(chirp.created_at).fromNow() }}</small><!-- [tl! add] -->
                </div>
            </div>
            <p class="mt-4 text-lg text-gray-900">{{ chirp.message }}</p>
        </div>
    </div>
</template>
```

```javascript tab=React filename=resources/js/Components/Chirp.jsx
import React from 'react';
import dayjs from 'dayjs';// [tl! add]
import relativeTime from 'dayjs/plugin/relativeTime';// [tl! add]

dayjs.extend(relativeTime);// [tl! add]

export default function Chirp({ chirp }) {
    return (
        <div className="p-6 flex space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                <path strokeLinecap="round" strokeLinejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <div className="flex-1">
                <div className="flex justify-between items-center">
                    <div>
                        <span className="text-gray-800">{chirp.user.name}</span>
                        <small className="ml-2 text-sm text-gray-600">{new Date(chirp.created_at).toLocaleString()}</small>
                        <small className="ml-2 text-sm text-gray-600">{dayjs(chirp.created_at).fromNow()}</small>
                    </div>
                </div>
                <p className="mt-4 text-lg text-gray-900">{chirp.message}</p>
            </div>
        </div>
    );
    // [tl! remove:-8,1 add:-7,1 .hidden]
}
```

Take a look in the browser to see your relative dates.

<img src="/img/screenshots/chirp-index-dates.png" alt="Chirp listing with relative dates" class="rounded-lg border dark:border-none shadow-lg" />

Feel free to Chirp some more, or even register another account and start a conversation!

[Continue to allow editing of Chirps...](/inertia/editing-chirps)
