<?php

namespace App\Listeners;

use App\Events\ClassCanceled;
use App\Mail\ClassCanceledMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mockery\Matcher\Not;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClassCanceledNotification;
use App\Jobs\NotifyClassCanceledJob;

class NotifyClassCanceled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCanceled $event): void
    {

        $members = $event->scheduledClass->members()->get();

        $className = $event->scheduledClass->classType->name;
        $classDateTime = $event->scheduledClass->date_time;

        $details = compact('className','classDateTime');

        $members->each(function($user ) use ($details){
            Mail::to($user)->send(new ClassCanceledMail($details));
        });

        NotifyClassCanceledJob::dispatch($members,$details);
    }
}