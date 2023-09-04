[TOC]

# <b>05.</b> Editing Chirps

Let's add a feature that's missing from other popular bird-themed microblogging platforms &mdash; the ability to edit Chirps!

## Updating our component

Next, let's update our `chirp.list` Livewire component to have an edit form for existing Chirps.

We'll use the `x-dropdown` component that comes with Breeze, which we'll only display to the Chirp author. We'll also display an indication if a Chirp has been edited by comparing the Chirp's `created_at` date with its `updated_at` date.

We'll also add the `update` method to validate the request and update the database:

```php tab=Class filename=resources/views/livewire/chirps/list.blade.php
<?php

use App\Models\Chirp;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule; // [tl! add]
use Livewire\Volt\Component;
use Illuminate\Support\Collection;

new class extends Component
{
    public Collection $chirps;

    public ?Chirp $chirpBeingEdited; // [tl! add:start]

    #[Rule('required|string|max:255')]
    public string $message;
    // [tl! add:end]
    public function mount(): void
    {
        $this->chirps = Chirp::with('user')->latest()->get();
    }

    #[On('chirp-created')]
    public function refreshChirps()
    {
        $this->chirps = Chirp::with('user')->latest()->get();
    }
    // [tl! add:start]
    public function edit(Chirp $chirp)
    {
        $this->chirpBeingEdited = $chirp;
        $this->message = $chirp->message;
    }

    public function cancelEdit()
    {
        $this->chirpBeingEdited = null;
        $this->message = '';
    }

    public function update()
    {
        $this->authorize('update', $this->chirpBeingEdited);

        $this->validate();

        $this->chirpBeingEdited->update([
            'message' => $this->message,
        ]);

        $this->chirpBeingEdited = null;

        $this->refreshChirps();
    } // [tl! add:end]
} ?>

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
                @if ($chirp->is($chirpBeingEdited)) <!-- [tl! add:start] -->
                    <form wire:submit="update">
                        <textarea
                            wire:model="message"
                            placeholder="{{ __('What\'s on your mind?') }}"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        ></textarea>

                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
                        <button wire:click.prevent="cancelEdit">{{ __('Cancel') }}</button>
                    </form>
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
use function Livewire\Volt\{on, state}; // [tl! remove]
use function Livewire\Volt\{on, rules, state}; // [tl! add]

state([
    'chirps' => fn () => Chirp::with('user')->latest()->get(),
    'chirpBeingEdited' => null,
    'message' => '',
]);
// [tl! add:start]
rules([
    'message' => 'required|string|max:255',
]); // [tl! add:end]

on(['chirp-created' => fn () => $this->chirps = Chirp::with('user')->latest()->get()]);
// [tl! add:start]
$edit = function (Chirp $chirp) {
    $this->chirpBeingEdited = $chirp;
    $this->message = $chirp->message;
};

$cancelEdit = function () {
    $this->chirpBeingEdited = null;
    $this->message = '';
};

$update = function () {
    $this->authorize('update', $this->chirpBeingEdited);

    $this->validate();

    $this->chirpBeingEdited->update([
        'message' => $this->message,
    ]);

    $this->chirpBeingEdited = null;

    $this->refreshChirps();
}; // [tl! add:end]

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
                @if ($chirp->is($chirpBeingEdited)) <!-- [tl! add:start] -->
                    <form wire:submit="update">
                        <textarea
                            wire:model="message"
                            placeholder="{{ __('What\'s on your mind?') }}"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        ></textarea>

                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
                        <button wire:click.prevent="cancelEdit">{{ __('Cancel') }}</button>
                    </form>
                @else
                    <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                @endif <!-- [tl! add:end] -->
            </div>
        </div>
    @endforeach
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
