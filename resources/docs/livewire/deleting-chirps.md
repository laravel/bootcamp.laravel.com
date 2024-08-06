[TOC]

# <b>06.</b> Deleting Chirps

Sometimes no amount of editing can fix a message, so let's give our users the ability to delete their Chirps.

Hopefully you're starting to get the hang of things now. We think you'll be impressed how quickly we can add this feature.

## Updating our component

To get started, let's update our `chirp.list` Livewire component to have a delete button and add an action to delete the Chirp when the button is clicked:

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

    #[On('chirp-created')]
    public function getChirps(): void
    {
        $this->chirps = Chirp::with('user')
            ->latest()
            ->get();
    }

    public function edit(Chirp $chirp): void
    {
        $this->editing = $chirp;

        $this->getChirps();
    }

    #[On('chirp-edit-canceled')]
    #[On('chirp-updated')]
    public function disableEditing(): void
    {
        $this->editing = null;

        $this->getChirps();
    } // [tl! collapse:end]
    // [tl! add:start]
    public function delete(Chirp $chirp): void
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        $this->getChirps();
    } // [tl! add:end]
}; ?>

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
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
                                <x-dropdown-link wire:click="delete({{ $chirp->id }})" wire:confirm="Are you sure to delete this chirp?"> <!-- [tl! add:start] -->
                                    {{ __('Delete') }}
                                </x-dropdown-link> <!-- [tl! add:end] -->
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
    @endforeach
</div>
```

```php tab=Functional filename=resources/views/livewire/chirps/list.blade.php
<?php
// [tl! collapse:start]
use App\Models\Chirp;
use function Livewire\Volt\{on, state};

$getChirps = fn () => $this->chirps = Chirp::with('user')->latest()->get();

$disableEditing = function () {
    $this->editing = null;

    return $this->getChirps();
};

state(['chirps' => $getChirps, 'editing' => null]);

on([
    'chirp-created' => $getChirps,
    'chirp-updated' => $disableEditing,
    'chirp-edit-canceled' => $disableEditing,
]);

$edit = function (Chirp $chirp) {
    $this->editing = $chirp;

    $this->getChirps();
}; // [tl! collapse:end]
// [tl! add:start]
$delete = function (Chirp $chirp) {
    $this->authorize('delete', $chirp);

    $chirp->delete();

    $this->getChirps();
}; // [tl! add:end]

?>

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
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
                                <x-dropdown-link wire:click="delete({{ $chirp->id }})" wire:confirm="Are you sure to delete this chirp?"> <!-- [tl! add:start] -->
                                    {{ __('Delete') }}
                                </x-dropdown-link> <!-- [tl! add:end] -->
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
    @endforeach
</div>
```

## Authorization

As with editing, we only want our Chirp authors to be able to delete their Chirps, so let's update the `delete` method in our `ChirpPolicy` class:

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

Rather than repeating the logic from the `update` method, we can define the same logic by calling the `update` method from our `delete` method. Anyone that is authorized to update a Chirp will now be authorized to delete it as well.

## Testing it out

If you Chirped anything you weren't happy with, try deleting it!

<img src="/img/screenshots/chirp-delete-blade.png" alt="Deleting a chirp" class="rounded-lg border dark:border-none shadow-lg" />

[Continue to notifications & events...](/livewire/notifications-and-events)
