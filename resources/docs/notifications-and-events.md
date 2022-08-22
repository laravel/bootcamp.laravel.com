[TOC]

# <b>07.</b> Notifications & Events

Let's take Chirper to the next level by sending email notifications when a new Chirp is created.

In addition to support for sending email, Laravel provides support for sending notifications across a variety of delivery channels, including email, SMS, and Slack. In addition, a variety of community built notification channels have been created to send notification over dozens of different channels! Notifications may also be stored in a database so they may be displayed in your web interface.

## Creating the notification

Artisan can, once again, do all the hard work for us with the following command:

```shell
./vendor/bin/sail artisan make:notification NewChirp
```

This will create a new notification at `app/Notifications/NewChirp.php` that is ready for us to customize.

Let's open this class and allow it to accept the Chirp that was just created, and then customize the message to include the name of the Chirp author, and a snippet from the message.

```php filename=app/Notifications/NewChirp.php
<?php
namespace App\Notifications;

use App\Models\Chirp;// [tl! add]
use Illuminate\Bus\Queueable;
use Illuminate\Support\Str;// [tl! add]
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewChirp extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()// [tl! remove]
    public function __construct(public Chirp $chirp)// [tl! add]
    {
        //
    }
    // [tl! collapse:start]
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }
    // [tl! collapse:end]
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')// [tl! remove]
                    ->action('Notification Action', url('/'))// [tl! remove]
                    ->subject("New Chirp from {$this->chirp->user->name}")// [tl! add]
                    ->greeting("New Chirp from {$this->chirp->user->name}")// [tl! add]
                    ->line(Str::limit($this->chirp->message, 50))// [tl! add]
                    ->action('Go to Chirper', url('/'))// [tl! add]
                    ->line('Thank you for using our application!');
    }
    // [tl! collapse:start]
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
    // [tl! collapse:end]
}
```

We could send the notification directly from the `store` method on our `ChirpController`, but that adds more work for the controller, which in turn could slow down the request, especially as we'll be querying the database and sending emails.

Instead, let's dispatch an event from the controller that we can listen for and process in a background queue.

## Creating an event

Events are a great way to decouple various aspects of your application, since a single event can have multiple listeners that do not depend on each other.

Let's create our event with the following command:

```shell
./vendor/bin/sail artisan make:event ChirpCreated
```

We'll be dispatching events for each new Chirp that is created, so let's update our `ChirpCreated` event to accept the newly created `Chirp` so we can pass it on to our notification.

```php filename=app/Events/ChirpCreated.php
<?php

namespace App\Events;

use App\Models\Chirp;// [tl! add]
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChirpCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()// [tl! remove]
    public function __construct(public Chirp $chirp)// [tl! add]
    {
        //
    }
    // [tl! collapse:start]
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
    // [tl! collapse:end]
}
```

Eloquent models automatically dispatch several events that you can hook into, including a `model:created` event. While we could use Laravel's built-in events, we wanted to demonstrate how you might create your own custom events. Check out the [Eloquent documentation](https://laravel.com/docs/9.x/eloquent#events) to learn more about the built-in events.

## Dispatching the event

We may now dispatch our `ChirpCreated` event from the `store` method on our `ChirpController`, passing in the Chirp that was just created:

```php filename=app/Http/Controllers/ChirpController.php
<?php
namespace App\Http\Controllers;

use App\Events\ChirpCreated;// [tl! add]
use App\Models\Chirp;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
    // [tl! collapse:end]
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

        $request->user()->chirps()->create($validated);// [tl! remove]
        $chirp = $request->user()->chirps()->create($validated);// [tl! add]

        ChirpCreated::dispatch($chirp);// [tl! add]

        return redirect(route('chirps.index'));
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
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chirp  $chirp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));
    }
    // [tl! collapse:end]
}
```

## Creating an event listener

Now that we're dispatching an event, we can listen for that event and send our notification.

Let's create a listener that subscribes to our `ChirpCreated` event:

```sail
./vendor/bin/sail artisan make:listener SendChirpNotifications --event=ChirpCreated
```

The new listener will be placed at `app/Listeners/SendChirpNotification.php`. Let's edit that file to send our notifications.

```php filename=app/Http/Listeners/SendChirpNotifications.php
<?php

namespace App\Listeners;

use App\Events\ChirpCreated;
use App\Models\User;// [tl! add]
use App\Notifications\NewChirp;// [tl! add]
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendChirpNotifications// [tl! remove]
class SendChirpNotifications implements ShouldQueue// [tl! add]
{
    // [tl! collapse:start]
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    // [tl! collapse:end]
    /**
     * Handle the event.
     *
     * @param  \App\Events\ChirpCreated  $event
     * @return void
     */
    public function handle(ChirpCreated $event)
    {
        //
        foreach (User::whereNot('id', $event->chirp->user_id)->cursor() as $user) {// [tl! remove:-1,1 add:start]
            $user->notify(new NewChirp($event->chirp));
        }// [tl! add:end]
    }
}
```

We've marked our listener with the `ShouldQueue` interface, which tells Laravel that the listener should be run via a [background queue](https://laravel.com/docs/queues).

We've then configured our listener to send notifications to every user in the platform, except for the author of the Chirp. In reality, this might annoy users, so you may want to implement a "following" feature so users only receive notifications for people they follow.

We've used a [database cursor](https://laravel.com/docs/eloquent#cursors) to avoid loading every user into memory at once, but another thing to be mindful of as your application scales, is any rate limiting that your mail provider might impose. You may want to consider sending a summary once per day using Laravel's [scheduling](https://laravel.com/docs/scheduling) feature.

> **Note**
> In a production application you should add the ability for your users to unsubscribe from notifications like these.

## Testing it out

Laravel Sail comes with [MailHog](https://github.com/mailhog/MailHog), an email testing tool that catches any emails coming from your application so you may view them.

We've configured our notification not to send to the Chirp author, so first be sure that you have registered at least two users accounts. Then, you may go ahead and send a Chirp from one of your registered accounts to trigger a notification.

In your web browser, navigate to [http://localhost:8025/](http://localhost:8025/) where you'll find MailHog's interface. In the inbox, you should see the notification from the message you just chirped!

### Sending emails in production

To send real emails in production, you will need an SMTP server, or a transactional email provider, such as Mailgun, Postmark, or Amazon SES. Laravel supports all of these out of the box. For more information, take a look at the [Mail documentation](https://laravel.com/docs/9.x/mail#introduction).

[Continue to learn about deploying your application...](/deploying)
