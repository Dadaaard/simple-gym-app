<?php

namespace App\Listeners;

use App\Events\TestEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class TestListener
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
    public function handle(TestEvent $event): void
    {
        
        $schedule = $event->schedule;
        Log::info('TestEvent is running');
    }
}
