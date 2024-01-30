<?php

namespace Onx\CodeSpy;

use Illuminate\Support\Facades\Facade;

class Spy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'spy';
    }

    public static function spy($object)
    {
        return spy($object);
    }

}
