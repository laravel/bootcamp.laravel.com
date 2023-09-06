[TOC]

# <b>05.</b> Editing Chirps

Let's add a feature that's missing from other popular bird-themed microblogging platforms &mdash; the ability to edit Chirps!

## Updating our component

Let's start by updating our existing `chirp.list` Livewire component to have an edit form for existing Chirps. The edit form will be a nested Livewire component that we'll create later.

First, we'll use the `x-dropdown` component that is included with Breeze. In addition, we will make this dropdown only visible to the Chirp's original author. In this dropdown, we'll add a link that will trigger the `edit` action on the component. This method will set the `editing` property to the Chirp that we want to edit. We'll use this property to conditionally display the edit form.

We'll also display an indication if a Chirp has been edited by comparing the Chirp's `created_at` date with its `updated_at` date:

```php tab=Class filename=resources/views/livewire/chirps/list.blade.php
<?php

use App\Models\Chirp;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component
{
    public Collection $chirps;
    // [tl! add:start]
    public ?Chirp $editing = null; // [tl! add:end]

    public function mount(): void
    {
        $this->getChirps();
    }

    #[On('chirp-created')]
    public function getChirps(): void
    {
        $this->chirps = Chirp::with('user')
            ->latest()
            ->get();
    }
    // [tl! add:start]
    public function edit(Chirp $chirp): void
    {
        $this->editing = $chirp;
    } // [tl! add:end]
}; ?>

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
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
                        @unless ($chirp->created_at->eq($chirp->updated_at))<!-- [tl! add:start] -->
                            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                        @endunless<!-- [tl! add:end] -->
                    </div>
                    @if ($chirp->user->is(auth()->user()))<!-- [tl! add:start] -->
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link wire:click="edit({{ $chirp->id }})">
                                    {{ __('Edit') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @endif<!-- [tl! add:end] -->
                </div>
                <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p><!-- [tl! remove] -->
                @if ($chirp->is($editing)) <!-- [tl! add:start] -->
                    <livewire:chirps.edit :chirp="$chirp" :key="$chirp->id" />
                @else
                    <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                @endif <!-- [tl! add:end] -->
            </div>
        </div>
    @endforeach
</div>
```

```php tab=Functional filename=resources/views/livewire/chirps/list.blade.php
<?php

use App\Models\Chirp;
use function Livewire\Volt\{on, state};

$getChirps = fn () => $this->chirps = Chirp::with('user')->latest()->get();

state(['chirps' => $getChirps]); // [tl! remove]
state(['chirps' => $getChirps, 'editing' => null]); // [tl! add]

on(['chirp-created' => $getChirps]);
// [tl! add:start]
$edit = fn (Chirp $chirp) => $this->editing = $chirp; // [tl! add:end]

?>

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
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
                        @unless ($chirp->created_at->eq($chirp->updated_at))<!-- [tl! add:start] -->
                            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                        @endunless<!-- [tl! add:end] -->
                    </div>
                    @if ($chirp->user->is(auth()->user()))<!-- [tl! add:start] -->
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link wire:click="edit({{ $chirp->id }})">
                                    {{ __('Edit') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @endif<!-- [tl! add:end] -->
                </div>
                <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p><!-- [tl! remove] -->
                @if ($chirp->is($editing)) <!-- [tl! add:start] -->
                    <livewire:chirps.edit :chirp="$chirp" :key="$chirp->id" />
                @else
                    <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                @endif <!-- [tl! add:end] -->
            </div>
        </div>
    @endforeach
</div>
```

## Creating the edit form

Next, let's create the `chirps.edit` Livewire component:

```shell tab=Class
php artisan make:volt chirps/edit --class
```

```shell tab=Functional
php artisan make:volt chirps/edit
```

This will create a new Livewire component at `resources/views/livewire/chirps/edit.blade.php`. Let's update the Livewire component content to display a form for editing a Chirp.

Note that, even though we're only displaying the edit button to the author of the Chirp, we also need to authorize the request on the server to make sure it's actually the Chirp's author requesting that the Chirp be updated:

```php tab=Class filename=resources/views/livewire/chirps/edit.blade.php
<?php

use App\Models\Chirp; // [tl! add:start]
use Livewire\Attributes\Rule; // [tl! add:end]
use Livewire\Volt\Component;

new class extends Component
{
    public Chirp $chirp; // [tl! add:start]

    #[Rule('required|string|max:255')]
    public string $message = '';

    public function mount(): void
    {
        $this->message = $this->chirp->message;
    }

    public function update(): void
    {
        $this->authorize('update', $this->chirp);

        $validated = $this->validate();

        $this->chirp->update($validated);

        $this->dispatch('chirp-updated');
    }

    public function cancel(): void
    {
        $this->dispatch('chirp-edit-canceled');
    }  // [tl! add:end]
}; ?>

<div>
    // <!-- [tl! remove] -->
    <form wire:submit="update"> <!-- [tl! add:start] -->
        <textarea
            wire:model="message"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>

        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        <button class="mt-4" wire:click.prevent="cancel">Cancel</button>
    </form> <!-- [tl! add:end] -->
</div>
```

```php tab=Functional filename=resources/views/livewire/chirps/edit.blade.php
<?php

use function Livewire\Volt\{state}; // [tl! remove]
use function Livewire\Volt\{mount, rules, state}; // [tl! add:start]

state(['chirp', 'message']);

rules(['message' => 'required|string|max:255']);

mount(fn () => $this->message = $this->chirp->message);

$update = function () {
    $this->authorize('update', $this->chirp);

    $validated = $this->validate();

    $this->chirp->update($validated);

    $this->dispatch('chirp-updated');
};

$cancel = fn () => $this->dispatch('chirp-edit-canceled'); // [tl! add:end]

?>

<div>
    // <!-- [tl! remove] -->
    <form wire:submit="update"> <!-- [tl! add:start] -->
        <textarea
            wire:model="message"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>

        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        <button class="mt-4" wire:click.prevent="cancel">Cancel</button>
    </form> <!-- [tl! add:end] -->
</div>
```

Finally, we'll need to update the `chirp.list` component to listen both for the `chirp-updated` and `chirp-edit-canceled` events.

If the `chirp-updated` event is dispatched, we'll need to update the list of Chirps. If the `chirp-edit-canceled` event is dispatched, we'll need to set the `editing` property to `null` so that the edit form is no longer displayed:

```php tab=Class filename=resources/views/livewire/chirps/list.blade.php
<?php
// [tl! collapse:start]

use App\Models\Chirp;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
// [tl! collapse:end]
new class extends Component
{
    // [tl! collapse:start]
    public Collection $chirps;

    public ?Chirp $editing = null;

    public function mount(): void
    {
        $this->getChirps();
    }
    // [tl! collapse:end]
    #[On('chirp-created')]
    #[On('chirp-updated')] // [tl! add]
    public function getChirps(): void
    {
        $this->editing = null; // [tl! add:start]
        // [tl! add:end]
        $this->chirps = Chirp::with('user')
            ->latest()
            ->get();
    }

    public function edit(Chirp $chirp): void
    {
        $this->editing = $chirp;
    }
    // [tl! add:start]
    #[On('chirp-edit-canceled')]
    public function cancelEdit(): void
    {
        $this->editing = null;
    } // [tl! add:end]
}; ?>

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
    <!-- [tl! collapse:start] -->
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
                        @unless ($chirp->created_at->eq($chirp->updated_at))
                            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                        @endunless
                    </div>
                    @if ($chirp->user->is(auth()->user()))
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link wire:click="edit({{ $chirp->id }})">
                                    {{ __('Edit') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @endif
                </div>
                <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                @if ($chirp->is($editing))
                    <livewire:chirps.edit :chirp="$chirp" :key="$chirp->id" />
                @else
                    <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                @endif
            </div>
        </div>
    @endforeach <!-- [tl! collapse:end] -->
</div>
```

```php tab=Functional filename=resources/views/livewire/chirps/list.blade.php
<?php

use App\Models\Chirp;
use function Livewire\Volt\{on, state};

$getChirps = fn () => $this->chirps = Chirp::with('user')->latest()->get(); // [tl! remove]
$getChirps = function () { // [tl! add:start]
    $this->editing = null;

    return $this->chirps = Chirp::with('user')->latest()->get();
}; // [tl! add:end]

state(['chirps' => $getChirps, 'editing' => null]);

on(['chirp-created' => $getChirps]); // [tl! remove]
on([ // [tl! add:start]
    'chirp-created' => $getChirps,
    'chirp-updated' => $getChirps,
    'chirp-edit-canceled' => fn () => $this->editing = null,
]); // [tl! add:end]

$edit = fn (Chirp $chirp) => $this->editing = $chirp;

?>

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
    <!-- [tl! collapse:start] -->
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
                        @unless ($chirp->created_at->eq($chirp->updated_at))
                            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                        @endunless
                    </div>
                    @if ($chirp->user->is(auth()->user()))
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link wire:click="edit({{ $chirp->id }})">
                                    {{ __('Edit') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @endif
                </div>
                <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                @if ($chirp->is($editing))
                    <livewire:chirps.edit :chirp="$chirp" :key="$chirp->id" />
                @else
                    <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                @endif
            </div>
        </div>
    @endforeach <!-- [tl! collapse:end] -->
</div>
```

## Authorization

By default, the `authorize` method will prevent *everyone* from being able to update the Chirp. We can specify who is allowed to update it by creating a [Model Policy](https://laravel.com/docs/authorization#creating-policies) with the following command:

```shell
php artisan make:policy ChirpPolicy --model=Chirp
```

This will create a policy class at `app/Policies/ChirpPolicy.php` which we can update to specify that only the author is authorized to update a Chirp:

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
    // [tl! collapse:end]
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chirp $chirp): bool
    {
        //
        return $chirp->user()->is($user);// [tl! remove:-1,1 add]
    }
    // [tl! collapse:start]
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chirp $chirp): bool
    {
        //
    }

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

## Testing it out

Time to test it out! Go ahead and edit a few Chirps using the dropdown menu. If you register another user account, you'll see that only the author of a Chirp can edit it.

<img src="/img/screenshots/chirp-editted.png" alt="An editted chirp" class="rounded-lg border dark:border-none shadow-lg" />

[Continue to allow deleting of Chirps...](/livewire/deleting-chirps)
