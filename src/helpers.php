<?php

use Illuminate\Support\Facades\Http;

if ( !function_exists('spy') ) {
function spy($object)
{
    $data = ['data' => $object];

    try {
        // Send a POST request to the specified endpoint
        $response = Http::post('http://localhost:8100/api/spies/', $data);

        // Optionally, check the response status code or content here
        if ($response->successful()) {
            // Return the original object or possibly the response itself
            return $response->json();
        }
    } catch (\Exception $e) {
        // Handle exceptions and return a detailed error message
        return response()->json([
            'error' => 'Request failed',
            'message' => $e->getMessage(),
            'code' => $e->getCode()
        ], 500);
    }
}
}


