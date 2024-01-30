<?php

use Illuminate\Support\Facades\Http;

if ( !function_exists('spy') ) {
    function spy($object)
    {
        $data = ['data' => $object];

        try {
            // Send a POST request to the specified endpoint
            Http::post('http://localhost:8100/api/spies/', $data);
        } catch (\Exception $e) {
            // Handle exceptions
            // Consider logging this error
            echo 'Request failed: ' . $e->getMessage();
        }

        return $object;
    }
}


