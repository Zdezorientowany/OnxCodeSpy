<?php

use Illuminate\Support\Facades\Http;

if ( !function_exists('spyOn') ) {
    function spyOn($object)
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);

        $file = basename($backtrace[0]['file']);
        $line = $backtrace[0]['line'];

        $data = [
            'data' => $object,
            'file' => $file,
            'line' => $line,
        ];

        try {
            // Send a POST request to the specified endpoint
            $response = Http::post('localhost:8100/api/spies/', $data);

            // Optionally, check the response status code or content here
            if ($response->successful()) {
                // Return the original object or possibly the response itself
                return $response->json();
            }else{
                return $response;
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


