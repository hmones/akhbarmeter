<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Voyager::addFormField("App\\Admin\\FormFields\\CustomFieldHandler");
    }
}
