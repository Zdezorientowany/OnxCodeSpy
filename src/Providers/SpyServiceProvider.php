<?php

namespace Onx\CodeSpy;

use Illuminate\Support\ServiceProvider;
use Onx\CodeSpy\Spy;

final class SpyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('spy', function () {
            return new Spy();
        });
    }
}
