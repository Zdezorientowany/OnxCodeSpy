<?php

namespace Onx\CodeSpy\Providers;

use Illuminate\Support\ServiceProvider;
use Onx\CodeSpy\SpyOn;

final class SpyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('spyOn', function () {
            return new SpyOn();
        });
    }
}
