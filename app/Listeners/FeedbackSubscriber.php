<?php

namespace App\Listeners;

use App\Events\FeedbackCreateEvent;
use App\Mail\FeedbackCreated;
use App\User;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Mail;

class FeedbackSubscriber
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

    }

    /**
     * @param $event
     */
    public function create($event): void
    {
        $admin = User::find(1);
        Mail::to($admin->email)->send(new FeedbackCreated($event->feedback));
    }

    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events): void
    {
        $events->listen(FeedbackCreateEvent::class, __CLASS__ . '@create');
    }
}
