<?php

use PHPUnit\Framework\TestCase;
use Onx\CodeSpy\SpyOn;


class SpyOnTest extends TestCase
{

    public function testSpyReturnObject()
    {
        $data = new stdClass();

        $spy = spyOn($data);

        $this->assertInstanceOf(stdClass::class, $spy);
    }
}
