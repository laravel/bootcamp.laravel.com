[TOC]

# <b>04.</b> Showing Chirps

In the previous step we added the ability to create Chirps, now we're ready to display them!

## Retrieving the Chirps

Let's update the `index` method on our `ChirpController` class to pass Chirps from every user to our index page:

```php filename=app/Http/Controllers/ChirpController.php
<?php
// [tl! collapse:start]
namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
// [tl! collapse:end]
class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('chirps.index');// [tl! remove]
        return view('chirps.index', [// [tl! add:start]
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);// [tl! add:end]
    }
    // [tl! collapse:start]
    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('store', [
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp): Response
    {
        //
    }
    // [tl! collapse:end]
}
```

Here we've used Eloquent's `with` method to [eager-load](https://laravel.com/docs/eloquent-relationships#eager-loading) every Chirp's associated user. We've also used the `latest` scope to return the records in reverse-chronological order.

> **Note**
> Returning all Chirps at once won't scale in production. Take a look at Laravel's powerful [pagination](https://laravel.com/docs/pagination) to improve performance.

## Connecting users to Chirps

We've instructed Laravel to return the `user` relationship so that we can display the name of the Chirp's author. But, the Chirp's `user` relationship hasn't been defined yet. To fix this, let's add a new ["belongs to"](https://laravel.com/docs/eloquent-relationships#one-to-many-inverse) relationship to our `Chirp` model:

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

## Updating our view

Next, let's update our `chirps.index` component to display the Chirps below our form:

```blade filename=resources/views/chirps/index.blade.php
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('chirps.store') }}">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->store->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y"><!-- [tl! add:start] -->
            @foreach ($chirps as $chirp)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $chirp->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                            </div>
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                    </div>
                </div>
            @endforeach
        </div><!-- [tl! add:end] -->
    </div>
</x-app-layout>
```

Now take a look in your browser to see the message you Chirped earlier!

<img src="/img/screenshots/chirp-index-blade.png" alt="Chirp listing" class="rounded-lg border dark:border-none shadow-lg" />

Feel free to Chirp some more, or even register another account and start a conversation!

[Continue to allow editing of Chirps...](/blade/editing-chirps)
