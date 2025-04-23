<?php

namespace App\Providers;

use App\Models\Topic;
use App\Observers\TopicObserver;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (! $this->app->environment('local')) {
            URL::forceScheme('https');
        }

        Topic::observe(TopicObserver::class);
    }
}
