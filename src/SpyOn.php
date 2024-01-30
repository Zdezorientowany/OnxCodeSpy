<?php

namespace Onx\CodeSpy;

use Illuminate\Support\Facades\Facade;

class SpyOn extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'spyOn';
    }

    public static function spyOn($object)
    {
        return spyOn($object);
    }

}
