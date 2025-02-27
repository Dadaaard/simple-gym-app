<?php

namespace App\Providers;

use App\Events\ClassCanceled;
use App\Events\TestEvent;
use App\Listeners\NotifyClassCanceled;
use App\Listeners\TestListener;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use PHPUnit\Event\Code\Test;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::define('schedule-class', function (User $user) {
            return $user->role === 'instructor';
        });

        Gate::define('book-class', function (User $user) {
            return $user->role === 'member';
        });

        // Event::listen(
        //     ClassCanceled::class,
        //     NotifyClassCanceled::class,
        // );

        Event::listen(
            TestEvent::class,
            TestListener::class,
        );
    }
}
