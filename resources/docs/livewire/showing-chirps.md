[TOC]

# <b>04.</b> Showing Chirps

In the previous step we added the ability to create Chirps, now we're ready to display them!

## Retrieving the Chirps

First, we should update our `resources/views/chirps.blade.php` view to display a listing of Chirps. For that, we can use a new Livewire component:

```blade filename=resources/views/chirps.blade.php
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <livewire:chirps.create />
        <!-- [tl! add:start] -->
        <livewire:chirps.list /><!-- [tl! add:end] -->
    </div>
</x-app-layout>
```

Then, let's create a new `chirps.list` Livewire component:

```shell tab=Class
php artisan make:volt chirps/list --class
```

```shell tab=Functional
php artisan make:volt chirps/list
```

This will create a new Livewire component at `resources/views/livewire/chirps/list.blade.php`. Let's update the Livewire component to display our list of Chirps:

```php tab=Class filename=resources/views/livewire/chirps/list.blade.php
<?php

use App\Models\Chirp; // [tl! add]
use Illuminate\Database\Eloquent\Collection; // [tl! add]
use Livewire\Volt\Component;

new class extends Component
{
    public Collection $chirps; // [tl! add:start]

    public function mount(): void
    {
        $this->chirps = Chirp::with('user')
            ->latest()
            ->get();
    } // [tl! add:end]
}; ?>

<div> <!-- [tl! remove] -->
    // <!-- [tl! remove] -->
<div class="mt-6 bg-white shadow-sm rounded-lg divide-y"> <!-- [tl! add:start] -->
    @foreach ($chirps as $chirp)
        <div class="p-6 flex space-x-2" wire:key="{{ $chirp->id }}">
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
    @endforeach <!-- [tl! add:end] -->
</div>
```

```php tab=Functional filename=resources/views/livewire/chirps/list.blade.php
<?php

use App\Models\Chirp; // [tl! add]
use function Livewire\Volt\{state};

state(['chirps' => fn () => Chirp::with('user')->latest()->get()]); // [tl! add]

?>

<div> <!-- [tl! remove] -->
    // <!-- [tl! remove] -->
<div class="mt-6 bg-white shadow-sm rounded-lg divide-y"> <!-- [tl! add:start] -->
    @foreach ($chirps as $chirp)
        <div class="p-6 flex space-x-2" wire:key="{{ $chirp->id }}">
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
    @endforeach <!-- [tl! add:end] -->
</div>
```

Here we've used Eloquent's `with` method to [eager-load](https://laravel.com/docs/eloquent-relationships#eager-loading) every Chirp's associated user. We've also used the `latest` scope to return the records in reverse-chronological order.

> **Note**
> Returning all Chirps at once won't scale in production. Take a look at Laravel's powerful [pagination](https://laravel.com/docs/pagination) to improve performance.

Finally, every time a new Chirp is created, we need to update the list of Chirps. We can do this using [Livewire events](https://livewire.laravel.com/docs/events). Let's dispatch an event each time a new Chirp is created:

```php tab=Class filename=resources/views/livewire/chirps/create.blade.php
<?php
// [tl! collapse:start]
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    #[Rule('required|string|max:255')]
    public $message = '';
    // [tl! collapse:end]
    public function store(): void
    {
        $validated = $this->validate();

        auth()->user()->chirps()->create($validated);

        $this->message = '';
        // [tl! add:start]
        $this->dispatch('chirp-created'); // [tl! add:end]
    }
}; ?> <!-- [tl! collapse:start] -->

<div> <!-- [tl! collapse:start] -->
    <form wire:submit="store">
        <textarea
            wire:model="message"
            placeholder="{{ __('What\'s on your mind?') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        />
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
    </form> <!-- [tl! collapse:end] -->
</div>
```

```php tab=Functional filename=resources/views/livewire/chirps/create.blade.php
<?php
// [tl! collapse:start]
use function Livewire\Volt\{state};
use function Livewire\Volt\{rules, state};

state(['message' => '']);

rules(['message' => 'required|string|max:255']);
// [tl! collapse:end]
$store = function () {
    $validated = $this->validate();

    auth()->user()->chirps()->create($validated);

    $this->message = '';
    // [tl! add:start]
    $this->dispatch('chirp-created'); // [tl! add:end]
};

?>

<div> <!-- [tl! collapse:start] -->
    <form wire:submit="store">
        <textarea
            wire:model="message"
            placeholder="{{ __('What\'s on your mind?') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        />

        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
    </form> <!-- [tl! collapse:end] -->
</div>
```

Now, we can update our `chirps.list` component to listen for the `chirp-created` event, and update the list of Chirps:

```php tab=Class filename=resources/views/livewire/chirps/list.blade.php
<?php

use App\Models\Chirp;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On; // [tl! add]
use Livewire\Volt\Component;

new class extends Component
{
    public Collection $chirps;

    public function mount(): void
    {
        $this->chirps = Chirp::with('user') // [tl! remove:start]
            ->latest()
            ->get(); // [tl! remove:end]
        $this->getChirps(); // [tl! add]
    }
    // [tl! add:start]
    #[On('chirp-created')]
    public function getChirps(): void
    {
        $this->chirps = Chirp::with('user')
            ->latest()
            ->get();
    } // [tl! add:end]
}; ?>

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
    <!-- [tl! collapse:start] -->
    @foreach ($chirps as $chirp)
        <div class="p-6 flex space-x-2" wire:key="{{ $chirp->id }}">
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
    @endforeach <!-- [tl! collapse:end] -->
</div>
```

```php tab=Functional filename=resources/views/livewire/chirps/list.blade.php
<?php

use App\Models\Chirp;
use function Livewire\Volt\{state}; // [tl! remove]
use function Livewire\Volt\{on, state}; // [tl! add]

state(['chirps' => Chirp::with('user')->latest()->get()]); // [tl! remove]
$getChirps = fn () => $this->chirps = Chirp::with('user')->latest()->get(); // [tl! add:start]

state(['chirps' => $getChirps]);

on(['chirp-created' => $getChirps]); // [tl! add:end]

?>

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
    <!-- [tl! collapse:start] -->
    @foreach ($chirps as $chirp)
        <div class="p-6 flex space-x-2" wire:key="{{ $chirp->id }}">
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
    @endforeach <!-- [tl! collapse:end] -->
</div>
```

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

Now take a look in your browser to see the message you Chirped earlier!

<img src="/img/screenshots/chirp-index.png" alt="Chirp listing" class="rounded-lg border dark:border-none shadow-lg" />

Feel free to Chirp some more, or even register another account and start a conversation!

[Continue to allow editing of Chirps...](/livewire/editing-chirps)
