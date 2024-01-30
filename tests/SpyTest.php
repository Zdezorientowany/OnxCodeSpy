<?php

use PHPUnit\Framework\TestCase;
use Onx\CodeSpy\Spy;


class SpyTest extends TestCase
{

    public function testSpyReturnObject()
    {
        $data = new stdClass();

        $spy = spy($data);

        $this->assertInstanceOf(stdClass::class, $spy);
    }
}
