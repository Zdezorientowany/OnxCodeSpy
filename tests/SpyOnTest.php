<?php

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Onx\CodeSpy\SpyOn;
use Illuminate\Support\Facades\Http;


class SpyOnTest extends OrchestraTestCase
{

    protected function setUp(): void {
        parent::setUp();
    }

    public function testSpyOnSuccess()
    {
        Http::fake([
            'host.docker.internal:8100/api/spies/' => Http::response(['success' => true], 200),
        ]);

        $object = ['key' => 'value'];
        $response = spyOn($object);

        $this->assertIsArray($response);
        $this->assertTrue($response['success']);
    }

    public function testSpyOnHttpError()
    {
        Http::fake([
            'host.docker.internal:8100/api/spies/' => Http::response(['error' => 'Bad Request'], 400),
        ]);

        $object = ['key' => 'value'];
        $response = spyOn($object);

        $this->assertEquals(400, $response->status());
        $this->assertArrayHasKey('error', $response->json());
    }
}
